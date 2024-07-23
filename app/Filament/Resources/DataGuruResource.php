<?php
namespace App\Filament\Resources;

use App\Filament\Resources\DataGuruResource\Pages;
use App\Models\DataGuru;
use App\Models\MataPelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DataGuruResource extends Resource
{
    protected static ?string $model = DataGuru::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_guru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('nomor_mp')
                    ->relationship('mataPelajaran', 'nama_mp')
                    ->label('Mata Pelajaran')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nip'),
                Tables\Columns\TextColumn::make('nama_guru'),
                Tables\Columns\TextColumn::make('mataPelajaran.nama_mp')->label('Mata Pelajaran'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataGurus::route('/'),
            'create' => Pages\CreateDataGuru::route('/create'),
            'edit' => Pages\EditDataGuru::route('/{record}/edit'),
        ];
    }
}
