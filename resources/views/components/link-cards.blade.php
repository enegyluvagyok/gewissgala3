@props(['items'])

<div class="linkcards-grid">
  @foreach($widgets as $w)
    @php
      $title   = $w->title ?: parse_url($w->url, PHP_URL_HOST);
      $excerpt = $w->excerpt ? \Illuminate\Support\Str::limit($w->excerpt, 200) : null;
      $img     = $w->image ? asset('storage/'.$w->image) : null;
      $domain  = parse_url($w->url, PHP_URL_HOST);
      $fallback= 'https://www.google.com/s2/favicons?domain='.$domain.'&sz=128';
    @endphp
    <a class="linkcard" href="{{ $w->url }}" target="_blank" rel="noopener">
      <div class="linkcard__media">
        <img src="{{ $img ?: $fallback }}" alt="{{ $title }}">
      </div>
      <div class="linkcard__body">
        <h4 class="linkcard__title">{{ $title }}</h4>
        @if($excerpt)
          <p class="linkcard__excerpt">{{ $excerpt }}</p>
        @endif
        <span class="linkcard__domain">{{ $domain }}</span>
      </div>
    </a>
  @endforeach
</div>