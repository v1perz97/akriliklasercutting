<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_produk')->required(),
                Select::make('category_id')->label('Kategori')->options(Category::pluck('nama', 'id')->toArray()),
                Select::make('subcategory_id')->label('Sub Kategori')->options(SubCategory::pluck('nama', 'id')->toArray()),
                FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->preserveFilenames()
                ->getUploadedFileNameForStorageUsing(function ($file) {
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                    $upload = Cloudinary::upload($file->getRealPath(), [
                        'folder' => 'product',
                        'public_id' => $originalName,
                        'overwrite' => true,
                        'format' => 'jpg',
                        'transformation' => [
                            'width' => 800,
                            'crop' => 'limit',
                        ],
                    ]);

                    return $upload->getSecurePath(); // simpan URL langsung
                }),
                Grid::make(1)->schema([
                    RichEditor::make('deskripsi')->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_produk'),
                TextColumn::make('deskripsi')->html()->limit(25),
                ImageColumn::make('gambar')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
