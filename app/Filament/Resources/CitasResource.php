<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CitasResource\Pages;
use App\Filament\Resources\CitasResource\RelationManagers;
use App\Models\Citas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CitasResource extends Resource
{
    protected static ?string $model = Citas::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha')->required(),
                Forms\Components\TextInput::make('hora')->required(),
                Forms\Components\Select::make('cliente_id')
                    ->relationship('cliente', 'nombre')
                    ->required(),
                Forms\Components\Select::make('mascota_id')
                    ->relationship('mascota', 'nombre_mascota')
                    ->required(),
                Forms\Components\Select::make('veterinario_id')
                    ->relationship('veterinario', 'nombre')
                    ->required(),
                Forms\Components\Select::make('tipo_servicio_id')
                    ->relationship('servicio', 'nombre')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha')->sortable(),
                Tables\Columns\TextColumn::make('hora'),
                Tables\Columns\TextColumn::make('cliente.nombre'),
                Tables\Columns\TextColumn::make('mascota.nombre_mascota'),
                Tables\Columns\TextColumn::make('veterinario.nombre'),
                Tables\Columns\TextColumn::make('servicio.nombre'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCitas::route('/'),
            'create' => Pages\CreateCitas::route('/create'),
            'edit' => Pages\EditCitas::route('/{record}/edit'),
        ];
    }
}
