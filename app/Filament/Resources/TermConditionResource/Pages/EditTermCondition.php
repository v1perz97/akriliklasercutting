<?php

namespace App\Filament\Resources\TermConditionResource\Pages;

use App\Filament\Resources\TermConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTermCondition extends EditRecord
{
    protected static string $resource = TermConditionResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
