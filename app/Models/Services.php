<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function getKeyName()
    // {
    //     return 'slug';
    // }
    protected static function booted()
    {
        static::deleting(function ($service) {
            if ($service->gambar) {
                $publicId = self::extractPublicIdFromUrl($service->gambar);
                if ($publicId) {
                    Cloudinary::destroy($publicId);
                }
            }
        });

        static::updating(function ($service) {
            if ($service->isDirty('gambar')) {
                $oldUrl = $service->getOriginal('gambar');
                $publicId = self::extractPublicIdFromUrl($oldUrl);
                if ($publicId) {
                    Cloudinary::destroy($publicId);
                }
            }
        });
    }


protected static function extractPublicIdFromUrl($url): ?string
{
    if (! $url) {
        return null;
    }

    // Contoh URL:
    // https://res.cloudinary.com/demo/image/upload/v1684600099/services/my-image.webp

    $parsed = parse_url($url);
    $path = $parsed['path'] ?? null;

    if (! $path) {
        return null;
    }

    // Hilangkan awalan "/<cloudinary_folder>/image/upload/v123456789/"
    $path = preg_replace('#^/[^/]+/image/upload/v\d+/#', '', $path);

    // Hilangkan ekstensi .jpg, .png, .webp
    $publicId = preg_replace('/\.(jpg|jpeg|png|gif|webp)$/', '', $path);

    return $publicId;
}

// protected static function booted()
//     {
//         static::deleting(function ($service) {
//             // Hapus satu gambar utama
//             if ($service->gambar) {
//                 $publicId = self::extractPublicIdFromUrl($service->gambar);
//                 if ($publicId) {
//                     Cloudinary::destroy($publicId);
//                 }
//             }

//             // Hapus semua gambar_multiple
//             if (is_array($service->gambar_multiple)) {
//                 foreach ($service->gambar_multiple as $url) {
//                     $publicId = self::extractPublicIdFromUrl($url);
//                     if ($publicId) {
//                         Cloudinary::destroy($publicId);
//                     }
//                 }
//             }
//         });

//         static::updating(function ($service) {
//             // Jika ada perubahan gambar_multiple, hapus yang lama
//             if ($service->isDirty('gambar_multiple')) {
//                 $old = $service->getOriginal('gambar_multiple');
//                 if (is_array($old)) {
//                     foreach ($old as $url) {
//                         $publicId = self::extractPublicIdFromUrl($url);
//                         if ($publicId) {
//                             Cloudinary::destroy($publicId);
//                         }
//                     }
//                 }
//             }
//         });
//     }
}
