<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Filament\Resources\PortfolioResource;
use App\Models\Portfolio;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePortfolio extends CreateRecord
{
    protected static string $resource = PortfolioResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $slug = Str::slug($data['judul_portfolio']);
    $originalSlug = $slug;
    $i = 1;

    while (Portfolio::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $i++;
    }

    $data['slug'] = $slug;

    return $data;
}
}
