<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use App\Models\Marca;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
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
            Section::make('Información básica')
                ->schema([
                    TextInput::make('nombre')->required(),
                    Textarea::make('description')->required(),
                    TextInput::make('precio')
                        ->label('Precio Base')
                        ->numeric()
                        ->prefix('$')
                        ->required(),
                ])
                ->columns(2),
                

            Section::make('Presentaciones del producto')
                ->schema([
                    Repeater::make('presentaciones')
                        ->relationship()
                        ->schema([
                            TextInput::make('nombre')
                                ->label('Presentación')
                                ->required(),
                            TextInput::make('precio_unitario')
                                ->label('Precio')
                                ->numeric()
                                ->prefix('$')
                                ->required(),
                            TextInput::make('cantidad_inventario')
                                ->label('Stock')
                                ->numeric()
                                ->required(),
                            FileUpload::make('imagen')
                                ->label('Imagen de la presentación')
                                ->image()
                                ->disk('public')
                                ->directory('presentaciones')
                                ->nullable()
                        ])
                        ->columns(4)
                        ->defaultItems(0)
                        ->label('Presentaciones'),
                ])
                ->collapsible(),

            Section::make('Categorización')
                ->schema([
                    Select::make('especie')
                        ->options([
                            'perro' => 'Perro',
                            'gato' => 'Gato',
                            'aves' => 'Aves',
                            'peces' => 'Peces',
                            'otros' => 'Otros',
                        ])
                        ->required(),

                    Select::make('edad')
                        ->options([
                            'cachorro' => 'Cachorro',
                            'adulto' => 'Adulto',
                            'senior' => 'Senior',
                        ])
                        ->required(),

                    Select::make('marca_id')
                        ->label('Marca')
                        ->options(Marca::all()->pluck('nombre', 'id'))
                        ->searchable()
                        ->required(),

                    Select::make('categoria')
                        ->options([
                            'Alimentos' => 'Alimentos',
                            'Accesorios' => 'Accesorios',
                            'Estética e Higiene' => 'Estética e Higiene',
                            'Medicamentos' => 'Medicamentos',
                            'Juguetes' => 'Juguetes',
                        ])
                        ->required(),

                    Forms\Components\Checkbox::make('destacado')
                        ->label('Producto destacado')
                        ->helperText('Si se marca, este producto se mostrará en la página de inicio')
                        ->default(false),

                    FileUpload::make('imagen')
                        ->label('Imagen principal')
                        ->image()
                        ->disk('public')
                        ->directory('productos')
                        ->nullable()
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nombre')
                ->searchable()
                ->sortable(),

            TextColumn::make('presentaciones.nombre')
                ->label('Presentaciones')
                ->listWithLineBreaks()
                ->limitList(3)
                ->expandableLimitedList(),

            TextColumn::make('presentaciones.precio_unitario')
                ->label('Precios')
                ->money('cop')
                ->listWithLineBreaks()
                ->limitList(3)
                ->expandableLimitedList(),

            TextColumn::make('presentaciones.cantidad_inventario')
                ->label('Stock')
                ->listWithLineBreaks()
                ->limitList(3)
                ->expandableLimitedList(),

            TextColumn::make('categoria')
                ->sortable(),

            TextColumn::make('marca_id'),

            TextColumn::make('especie'),

            TextColumn::make('created_at')
                ->dateTime()
                ->label('Creado'),
        ])
        ->filters([
            
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            
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
