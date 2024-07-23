<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekapNilaiResource\Pages;
use App\Filament\Resources\RekapNilaiResource\RelationManagers;
use App\Models\RekapNilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RekapNilaiResource extends Resource
{
    protected static ?string $model = RekapNilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nilai_id')
                ->required(),
                Forms\Components\TextInput::make('nilai')
                ->required(),
                Forms\Components\TextInput::make('semester')
                ->required(),
                Forms\Components\Select::make('nisn')
                ->relationship('murid', 'nama_murid')
                ->label('Nama Murid')
                ->required(),
                Forms\Components\Select::make('nomor_mp')
                ->relationship('mataPelajaran','nama_mp')
                ->label('Mata Pelajaran')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nilai_id'),
                Tables\Columns\TextColumn::make('nilai'),
                Tables\Columns\TextColumn::make('semester'),
                Tables\Columns\TextColumn::make('murid.nama_murid')->label('Nama Murid'),
                Tables\Columns\TextColumn::make('mataPelajaran.nama_mp')->label('Mata Pelajaran'),
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
            'index' => Pages\ListRekapNilais::route('/'),
            'create' => Pages\CreateRekapNilai::route('/create'),
            'edit' => Pages\EditRekapNilai::route('/{record}/edit'),
        ];
    }
}
