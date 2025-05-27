<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Filament\Resources\PortfolioResource\RelationManagers;
use App\Models\Portfolio;
use App\Models\Services;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpOption\Option;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('judul_portfolio')
                ->label('Name')
                ->required()
                ->maxLength(255),

            Select::make('jenis_service (optional)')->options(
                Services::all()
                ->mapWithKeys(function ($service) {
                    return $service->judul_service
                        ? [$service->id => $service->judul_service]
                        : []; // skip if name is null
                })
                ->toArray()
                ),

            FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->preserveFilenames()
                ->getUploadedFileNameForStorageUsing(function ($file) {
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                    $upload = Cloudinary::upload($file->getRealPath(), [
                        'folder' => 'portfolios',
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

            Grid::make(1)->schema([
                RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required(),
            ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul_portfolio')->label('Name'),
                ImageColumn::make('gambar')->label('Gambar'),
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
