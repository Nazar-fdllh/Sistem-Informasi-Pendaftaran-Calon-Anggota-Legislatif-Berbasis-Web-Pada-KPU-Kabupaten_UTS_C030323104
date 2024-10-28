<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalonLegislatifResource\Pages;
use App\Models\CalonLegislatif;
use App\Models\Partai; // Jika ada relasi ke Partai
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CalonLegislatifResource extends Resource
{
    protected static ?string $model = CalonLegislatif::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Konfigurasi Form untuk Create / Edit
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                Forms\Components\Select::make('partai_id')
                    ->label('Partai')
                    ->relationship('partai', 'nama')
                    ->required()
                    ->searchable(),

                Forms\Components\Textarea::make('visi_misi')
                    ->label('Visi dan Misi')
                    ->rows(5)
                    ->maxLength(1000),
            ]);
    }

    // Konfigurasi Tabel untuk View (List)
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('partai.nama')
                    ->label('Partai')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->date(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Terdaftar Pada')
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                // Filter Berdasarkan Partai
                Tables\Filters\SelectFilter::make('partai_id')
                    ->label('Filter Partai')
                    ->relationship('partai', 'nama'),

                // Filter Berdasarkan Tanggal Terdaftar
                Tables\Filters\DateFilter::make('created_at')
                    ->label('Tanggal Terdaftar'),
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
            // Tambahkan relasi jika ada, misalnya RiwayatPekerjaan
            // RelationManagers\RiwayatPekerjaanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCalonLegislatifs::route('/'),
            'create' => Pages\CreateCalonLegislatif::route('/create'),
            'edit' => Pages\EditCalonLegislatif::route('/{record}/edit'),
        ];
    }
}
