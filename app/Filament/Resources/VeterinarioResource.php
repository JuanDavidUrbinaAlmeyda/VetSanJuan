<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VeterinarioResource\Pages;
use App\Filament\Resources\VeterinarioResource\RelationManagers;
use App\Models\Veterinario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VeterinarioResource extends Resource
{
    protected static ?string $model = Veterinario::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Veterinarios';
    
    protected static ?string $modelLabel = 'Veterinario';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('especialidad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefono')
                    ->required()
                    ->tel()
                    ->maxLength(20),
                Forms\Components\TextInput::make('licencia_profesional')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_licencia')
                    ->required(),
                Forms\Components\TextInput::make('correo_electronico')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('horario')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('especialidad')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('licencia_profesional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_licencia')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListVeterinarios::route('/'),
            'create' => Pages\CreateVeterinario::route('/create'),
            'edit' => Pages\EditVeterinario::route('/{record}/edit'),
        ];
    }
}
