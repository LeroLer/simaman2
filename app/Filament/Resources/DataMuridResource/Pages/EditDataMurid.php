<?php

namespace App\Filament\Resources\DataMuridResource\Pages;

use App\Filament\Resources\DataMuridResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataMurid extends EditRecord
{
    protected static string $resource = DataMuridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
