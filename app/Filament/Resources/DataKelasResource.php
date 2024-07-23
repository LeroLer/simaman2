<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataKelasResource\Pages;
use App\Filament\Resources\DataKelasResource\RelationManagers;
use App\Models\DataKelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataKelasResource extends Resource
{
    protected static ?string $model = DataKelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_kelas')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('kelas')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('nip')
                ->relationship('guru', 'nama_guru')
                ->label('Wali Kelas')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               Tables\Columns\TextColumn::make('kode_kelas'),
               Tables\Columns\TextColumn::make('kelas'),
               Tables\Columns\TextColumn::make('guru.nama_guru')->label('Wali Kelas'),
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
            'index' => Pages\ListDataKelas::route('/'),
            'create' => Pages\CreateDataKelas::route('/create'),
            'edit' => Pages\EditDataKelas::route('/{record}/edit'),
        ];
    }
}
