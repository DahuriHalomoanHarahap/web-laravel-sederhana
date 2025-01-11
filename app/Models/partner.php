<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class partner extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'link',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($section) {
            // Periksa apakah kolom thumbnail diubah
            if ($section->isDirty('thumbnail')) {
                // Hapus gambar lama
                $originalThumbnail = $section->getOriginal('thumbnail');
                if ($originalThumbnail) {
                    Storage::disk('public')->delete($originalThumbnail);
                }
            }
        });
    }
}
