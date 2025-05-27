<?php

namespace App\Filament\Resources\ServicesResource\Pages;

use App\Filament\Resources\ServicesResource;
use App\Models\Services;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateServices extends CreateRecord
{
    protected static string $resource = ServicesResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Generate slug unik
        $slug = Str::slug($data['judul_service']);
        $originalSlug = $slug;
        $i = 1;

        while (Services::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }

        $data['slug'] = $slug;

        // Upload gambar_multiple ke Cloudinary
        if (isset($data['gambar_multiple']) && is_array($data['gambar_multiple'])) {
            $uploadedUrls = [];

            foreach ($data['gambar_multiple'] as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                $upload = Cloudinary::upload($file->getRealPath(), [
                    'folder' => 'services',
                    'public_id' => $originalName . '-' . uniqid(),
                    'overwrite' => true,
                    'format' => 'webp',
                    'transformation' => [
                        'width' => 800,
                        'crop' => 'limit',
                    ],
                ]);

                $uploadedUrls[] = $upload->getSecurePath();
            }

            $data['gambar_multiple'] = $uploadedUrls;
        }

        return $data;
    }
}
