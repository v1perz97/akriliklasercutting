<?php

namespace App\Filament\Resources\TermConditionResource\Pages;

use App\Filament\Resources\TermConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTermConditions extends ListRecords
{
    protected static string $resource = TermConditionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
