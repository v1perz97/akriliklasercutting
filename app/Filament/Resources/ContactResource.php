<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('icon')
                ->label('Logo')
                ->image()
                ->preserveFilenames()
                ->getUploadedFileNameForStorageUsing(function ($file) {
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                    $upload = Cloudinary::upload($file->getRealPath(), [
                        'folder' => 'contact',
                        'public_id' => $originalName,
                        'overwrite' => true,
                        // 'format' => 'webp',
                        'transformation' => [
                            'width' => 800,
                            'crop' => 'limit',
                        ],
                    ]);

                    return $upload->getSecurePath(); // simpan URL langsung
                }),
                TextInput::make('name')->required()->label('Nama'),
                TextInput::make('deskripsi')->required()->label('Deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon'),
                TextColumn::make('name'),
                TextColumn::make('deskripsi'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
