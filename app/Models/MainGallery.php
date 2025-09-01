<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Http\UploadedFile;

class MainGallery extends Model
{
    use CrudTrait;

    protected $table = 'main_gallery';
    protected $fillable = ['title', 'category', 'image', 'sort', 'is_active'];
    protected $casts = [
        'is_active' => 'bool',
        'sort'      => 'int',
    ];

    // Accessor: easy URL for frontend (always works with asset())
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    // Mutator: handle upload/delete from Backpack "upload" field
    public function setImageAttribute($value): void
    {
        // remove flag
        if ($value === null || $value === '' || $value === false) {
            if (!empty($this->attributes['image'])) {
                $path = storage_path('app/public/' . $this->attributes['image']);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }
            $this->attributes['image'] = null;
            return;
        }

        // uploaded file
        if ($value instanceof UploadedFile) {
            // delete old file if any
            if (!empty($this->attributes['image'])) {
                $path = storage_path('app/public/' . $this->attributes['image']);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            // store new one
            $path = $value->store('gallery', 'public'); // storage/app/public/gallery/...
            $this->attributes['image'] = $path;
            return;
        }

        // string value (already stored path)
        if (is_string($value)) {
            $this->attributes['image'] = $value;
        }
    }
}
