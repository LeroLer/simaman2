<?php

namespace App\Filament\Resources\RekapNilaiResource\Pages;

use App\Filament\Resources\RekapNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekapNilais extends ListRecords
{
    protected static string $resource = RekapNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
