<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nombre')->required(),

            Textarea::make('description'),

            TextInput::make('precio_unitario')
                ->label('Precio Unitario Base')
                ->numeric()
                ->required(),

            TextInput::make('cantidad_inventario')
                ->label('Cantidad en Inventario Base')
                ->numeric()
                ->required(),

            TextInput::make('categoria')->nullable(),
            
            Select::make('marca')
                ->options(function() {
                    return Producto::select('marca')
                        ->whereNotNull('marca')
                        ->distinct()
                        ->pluck('marca', 'marca')
                        ->toArray();
                })
                ->searchable()
                ->createOptionForm([
                    TextInput::make('marca')
                        ->required()
                ])
                ->nullable(),
                
            TextInput::make('subcategoria')->nullable(),

            FileUpload::make('url_imagen')
                ->label('Imagen')
                ->image()
                ->disk('public')
                ->directory('productos')
                ->nullable(),

            Repeater::make('presentaciones')
                ->relationship()
                ->schema([
                    TextInput::make('nombre')
                        ->label('Presentación')
                        ->required(),
                    TextInput::make('precio')
                        ->numeric()
                        ->required(),
                    TextInput::make('stock')
                        ->numeric()
                        ->required()
                ])
                ->columns(3)
                ->defaultItems(0)
                ->label('Presentaciones Adicionales'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nombre')->searchable()->sortable(),

            TextColumn::make('precio_unitario')
                ->label('Precio')
                ->money('cop')
                ->sortable(),

            TextColumn::make('cantidad_inventario')
                ->label('Inventario'),

            TextColumn::make('categoria')->sortable(),
            TextColumn::make('marca'),
            TextColumn::make('subcategoria'),

            TextColumn::make('created_at')->dateTime()->label('Creado'),
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
