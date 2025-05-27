<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['judul_produk', 'slug', 'gambar', 'lokasi', 'nama_kategori', 'client'];

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
}
