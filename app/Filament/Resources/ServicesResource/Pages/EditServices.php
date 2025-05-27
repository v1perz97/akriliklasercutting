<?php

namespace App\Filament\Resources\ServicesResource\Pages;

use App\Filament\Resources\ServicesResource;
use App\Models\Services;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditServices extends EditRecord
{
    protected static string $resource = ServicesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeUpdate(array $data): array
    {
        // Generate slug unik (sama seperti create)
        $slug = Str::slug($data['judul_service']);
        $originalSlug = $slug;
        $i = 1;

        while (
            Services::where('slug', $slug)
                ->where('id', '!=', $this->record->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $i++;
        }

        $data['slug'] = $slug;

        // Upload ulang gambar_multiple ke Cloudinary jika berubah
        if (isset($data['gambar_multiple']) && is_array($data['gambar_multiple'])) {
            // Hapus gambar lama (jika ada)
            $oldImages = $this->record->gambar_multiple ?? [];
            foreach ($oldImages as $url) {
                $publicId = $this->extractPublicIdFromUrl($url);
                if ($publicId) {
                    Cloudinary::destroy($publicId);
                }
            }

            // Upload gambar baru
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

    // Helper: ambil public_id dari URL Cloudinary
    protected function extractPublicIdFromUrl($url): ?string
    {
        if (! $url) {
            return null;
        }

        $parsed = parse_url($url);
        $path = $parsed['path'] ?? null;

        if (! $path) {
            return null;
        }

        // /<cloudinary_folder>/image/upload/v1234567890/filename.webp
        $path = preg_replace('#^/[^/]+/image/upload/v\d+/#', '', $path);
        $publicId = preg_replace('/\.(jpg|jpeg|png|gif|webp)$/', '', $path);

        return $publicId;
    }
}
