<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPelajaranResource\Pages;
use App\Filament\Resources\JadwalPelajaranResource\RelationManagers;
use App\Models\JadwalPelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPelajaranResource extends Resource
{
    protected static ?string $model = JadwalPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_jadwal')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('hari')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('waktu_mulai')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('waktu_selesai')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('nip')
                ->relationship('guru', 'nama_guru')
                ->label('Nama Guru')
                ->required(),
                Forms\Components\Select::make('nomor_mp')
                ->relationship('mataPelajaran', 'nama_mp')
                ->label('Mata Pelajaran')
                ->required(),
                Forms\Components\Select::make('kode_kelas')
                ->relationship('kelas','kelas')
                ->label('Kelas')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_jadwal'),
                Tables\Columns\TextColumn::make('hari'),
                Tables\Columns\TextColumn::make('waktu_mulai'),
                Tables\Columns\TextColumn::make('waktu_selesai'),
                Tables\Columns\TextColumn::make('guru.nama_guru')->label('Nama Guru'),
                Tables\Columns\TextColumn::make('mataPelajaran.nama_mp')->label('Mata Pelajaran'),
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
            'index' => Pages\ListJadwalPelajarans::route('/'),
            'create' => Pages\CreateJadwalPelajaran::route('/create'),
            'edit' => Pages\EditJadwalPelajaran::route('/{record}/edit'),
        ];
    }
}
