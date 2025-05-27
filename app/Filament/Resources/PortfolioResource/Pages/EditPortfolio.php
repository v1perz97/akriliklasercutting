<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Filament\Resources\PortfolioResource;
use App\Models\Portfolio;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditPortfolio extends EditRecord
{
    protected static string $resource = PortfolioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeUpdate(array $data): array
{
    $slug = Str::slug($data['judul_portfolio']);
    $originalSlug = $slug;
    $i = 1;

    while (
        Portfolio::where('slug', $slug)
            ->where('id', '!=', $this->record->id) // Abaikan record sendiri saat update
            ->exists()
    ) {
        $slug = $originalSlug . '-' . $i++;
    }

    $data['slug'] = $slug;

    return $data;
}
}
