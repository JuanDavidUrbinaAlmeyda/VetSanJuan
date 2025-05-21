<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeluqueroResource\Pages;
use App\Models\Peluquero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PeluqueroResource extends Resource
{
    protected static ?string $model = Peluquero::class;

    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    
    protected static ?string $navigationLabel = 'Peluqueros';
    
    protected static ?string $modelLabel = 'Peluquero';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre'),
                Forms\Components\TextInput::make('telefono')
                    ->required()
                    ->tel()
                    ->maxLength(20)
                    ->label('Teléfono'),
                Forms\Components\TextInput::make('correo_electronico')
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->label('Correo Electrónico'),
                Forms\Components\TextInput::make('horario')
                    ->required()
                    ->maxLength(255)
                    ->label('Horario de Trabajo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable()
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable()
                    ->label('Teléfono'),
                Tables\Columns\TextColumn::make('correo_electronico')
                    ->searchable()
                    ->label('Correo Electrónico'),
                Tables\Columns\TextColumn::make('horario')
                    ->searchable()
                    ->label('Horario'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeluqueros::route('/'),
            'create' => Pages\CreatePeluquero::route('/create'),
            'edit' => Pages\EditPeluquero::route('/{record}/edit'),
        ];
    }
}