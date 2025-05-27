<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::deleting(function ($product) {
            if ($product->gambar) {
                $publicId = self::extractPublicIdFromUrl($product->gambar);
                if ($publicId) {
                    Cloudinary::destroy($publicId);
                }
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('gambar')) {
                $oldUrl = $product->getOriginal('gambar');
                $publicId = self::extractPublicIdFromUrl($oldUrl);
                if ($publicId) {
                    Cloudinary::destroy($publicId);
                }
            }
        });

        static::saving(function ($produk) {
            // Pastikan nama produk tidak kosong
            if (!empty($produk->nama_produk)) {
                // Generate ulang hanya jika slug kosong atau nama produk berubah
                if (empty($produk->slug) || $produk->isDirty('nama_produk')) {
                    $produk->slug = static::generateUniqueSlug($produk->nama_produk, $produk->id);
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
    // https://res.cloudinary.com/demo/image/upload/v1684600099/product$products/my-image.webp

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

protected static function generateUniqueSlug($judul, $id = null)
    {
        $slug = Str::slug($judul);
        $originalSlug = $slug;
        $i = 1;

        while (static::where('slug', $slug)
            ->when($id, fn($q) => $q->where('id', '!=', $id))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $i++;
        }

        return $slug;
    }
}
