<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class LinkWidget extends Model
{
    use CrudTrait;

    protected $fillable = ['title','url','excerpt','image','sort','is_active','fetched_at'];
    protected $casts = ['is_active'=>'bool','sort'=>'int','fetched_at'=>'datetime'];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }

    /**
     * OG meta gyors lehúzása (szerveroldalon).
     * - description (og:description, fallback meta[name=description])
     * - image (og:image -> letöltjük és mentjük public diszkre)
     */
    public function fetchMeta(bool $force = false): void
{
    if (!$force && $this->fetched_at && $this->fetched_at->gt(now()->subDays(7))) return;
    if (!$this->url) return;

    try {
        $resp = \Illuminate\Support\Facades\Http::timeout(8)
            ->withHeaders(['User-Agent'=>'Mozilla/5.0 (compatible; GewissBot/1.0)'])
            ->get($this->url);

        if (!$resp->ok()) return;

        $html = $resp->body();

        // 1) OG description -> 2) meta[name=description] -> 3) első <p> fallback
        $desc  = $this->extractMeta($html, [['property','og:description'], ['name','description']])
              ?: $this->firstParagraph($html);

        // OG image letöltés & mentés (ha van)
        $imgUrl = $this->absoluteUrl($this->extractMeta($html, [['property','og:image']]) ?? '', $this->url);
        if ($imgUrl) {
            $imgResp = \Illuminate\Support\Facades\Http::timeout(8)->get($imgUrl);
            if ($imgResp->ok()) {
                $ext = $this->guessExt($imgResp->header('Content-Type'));
                $path = 'linkwidgets/'.uniqid().($ext?'.'.$ext:'');
                \Illuminate\Support\Facades\Storage::disk('public')->put($path, $imgResp->body());
                if ($this->image) \Illuminate\Support\Facades\Storage::disk('public')->delete($this->image);
                $this->image = $path;
            }
        }

        if ($desc) {
            // normalizálás + rövidítés
            $desc = trim(preg_replace('/\s+/u',' ', $desc));
            $this->excerpt = \Illuminate\Support\Str::limit($desc, 240);
        }

        $this->fetched_at = now();
        $this->save();
    } catch (\Throwable $e) {
        // opcionális: \Log::warning($e->getMessage());
    }
}

// új helper a modellben:
protected function firstParagraph(string $html): ?string
{
    // vedd az első 200+ karakteres bekezdést
    if (preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $html, $m)) {
        foreach ($m[1] as $p) {
            $text = trim(strip_tags(html_entity_decode($p, ENT_QUOTES|ENT_HTML5, 'UTF-8')));
            if (mb_strlen($text) >= 80) return $text; // legyen értelmes hosszú
        }
        // ha rövidek voltak, legalább az első
        $first = trim(strip_tags(html_entity_decode($m[1][0], ENT_QUOTES|ENT_HTML5, 'UTF-8')));
        return $first ?: null;
    }
    return null;
}

    protected function extractMeta(string $html, array $candidates): ?string
    {
        foreach ($candidates as [$attr, $val]) {
            if (preg_match('/<meta\s+[^>]*'.preg_quote($attr,'/').'=["\']'.preg_quote($val,'/').'["\'][^>]*content=["\']([^"\']+)["\']/i', $html, $m)) {
                return html_entity_decode($m[1], ENT_QUOTES|ENT_HTML5, 'UTF-8');
            }
        }
        return null;
    }

    protected function absoluteUrl(?string $maybe, string $base): ?string
    {
        if (!$maybe) return null;
        if (preg_match('#^https?://#i', $maybe)) return $maybe;
        // relatív -> abszolút
        $b = parse_url($base);
        if (!$b || empty($b['scheme']) || empty($b['host'])) return null;
        $root = $b['scheme'].'://'.$b['host'].(!empty($b['port'])?':'.$b['port']:'');
        if (str_starts_with($maybe,'//')) return $b['scheme'].':'.$maybe;
        if (str_starts_with($maybe,'/')) return $root.$maybe;
        $dir = isset($b['path']) ? rtrim(dirname($b['path']),'/') : '';
        return $root.$dir.'/'.$maybe;
    }

    protected function guessExt(?string $mime): ?string
    {
        return match($mime){
            'image/jpeg','image/jpg' => 'jpg',
            'image/png'              => 'png',
            'image/webp'             => 'webp',
            'image/gif'              => 'gif',
            default => null,
        };
    }

    public function fetchMetaButton(): string
{
    $url = route('link-widget.fetch-meta', $this->getKey());
    return '<a href="'.$url.'" class="btn btn-sm btn-link">
              <i class="la la-sync"></i> Meta frissítése
            </a>';
}
}
