<?php

namespace App\Filament\Resources\DataMuridResource\Pages;

use App\Filament\Resources\DataMuridResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataMurids extends ListRecords
{
    protected static string $resource = DataMuridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
