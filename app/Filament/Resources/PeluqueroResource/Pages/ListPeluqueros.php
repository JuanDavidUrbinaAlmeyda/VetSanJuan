<?php

namespace App\Filament\Resources\PeluqueroResource\Pages;

use App\Filament\Resources\PeluqueroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeluqueros extends ListRecords
{
    protected static string $resource = PeluqueroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
