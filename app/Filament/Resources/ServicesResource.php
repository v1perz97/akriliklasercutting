<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesResource\Pages;
use App\Filament\Resources\ServicesResource\RelationManagers;
use App\Models\Services;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\View;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Str;

class ServicesResource extends Resource
{
    protected static ?string $model = Services::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul_service')
                    ->label('Judul Service')
                    ->required()
                    ->maxLength(255),

                    FileUpload::make('gambar')
    ->label('Gambar')
    ->image()
    ->preserveFilenames()
    ->getUploadedFileNameForStorageUsing(function ($file) {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $upload = Cloudinary::upload($file->getRealPath(), [
            'folder' => 'services',
            'public_id' => $originalName,
            'overwrite' => true,
            'format' => 'jpg',
            'transformation' => [
                'width' => 1000,
                'crop' => 'limit',
                'quality' => 100, // atau bisa juga 'auto' atau '100'
            ],
        ]);

        return $upload->getSecurePath(); // simpan URL langsung
    }),

            Grid::make(1)->schema([

                Forms\Components\RichEditor::make('deskripsi')
                ->label('Deskripsi')
                ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul_service'),
                TextColumn::make('deskripsi')
                    ->html()->limit(25),
                    ImageColumn::make('gambar')
    ->label('Gambar')->url(fn ($record) => $record->gambar) // pastikan ambil URL
    ->height(80) // opsional
    ->width(80) // opsional

            ])
            ->filters([
                Filter::make('judul_service', fn ($query) => $query),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateServices::route('/create'),
            'edit' => Pages\EditServices::route('/{record}/edit'),
        ];
    }
}
