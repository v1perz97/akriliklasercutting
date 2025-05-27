<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TermConditionResource\Pages;
use App\Filament\Resources\TermConditionResource\RelationManagers;
use App\Models\TermCondition;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TermConditionResource extends Resource
{
    protected static ?string $model = TermCondition::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('deskripsi')->required()->extraAttributes([
                    'class' => 'min-h-[400px] w-full',
                ])
                ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('deskripsi')->label('Deskripsi')->limit(25)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
            // ->bulkActions([
            //     Tables\Actions\DeleteBulkAction::make(),
            // ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTermConditions::route('/'),
            // 'create' => Pages\CreateTermCondition::route('/create'),
            'edit' => Pages\EditTermCondition::route('/{record}/edit'),
        ];
    }
}
