<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataMuridResource\Pages;
use App\Filament\Resources\DataMuridResource\RelationManagers;
use App\Models\DataMurid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataMuridResource extends Resource
{
    protected static ?string $model = DataMurid::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nisn')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('nama_murid')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('jenis_kelamin')
                ->required()
                ->options([
                    'Laki Laki'=> 'Laki_Laki',
                    'Perempuan'=> 'Perempuan',
                ]),
                Forms\Components\TextInput::make('alamat_murid')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('kode_kelas')
                ->relationship('kelas', 'kelas')
                ->label('Kelas')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nisn'),
                Tables\Columns\TextColumn::make('nama_murid'),
                Tables\Columns\TextColumn::make('alamat_murid'),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('no_hp'),
                Tables\Columns\TextColumn::make('kelas.kelas')->label('Kelas'),
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
            'index' => Pages\ListDataMurids::route('/'),
            'create' => Pages\CreateDataMurid::route('/create'),
            'edit' => Pages\EditDataMurid::route('/{record}/edit'),
        ];
    }
}
