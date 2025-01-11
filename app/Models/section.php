<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Section extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'post_as',
    ];

    // Event untuk menghapus gambar lama saat mengupdate
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

        // // Event untuk menghapus gambar saat menghapus record
        // static::deleting(function ($section) {
        //     if ($section->thumbnail) {
        //         Storage::disk('public')->delete($section->thumbnail);
        //     }
        // });
    }
}