<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartaiResource\Pages;
use App\Models\Partai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter; // Import Filter
use Illuminate\Database\Eloquent\Builder;

class PartaiResource extends Resource
{
    protected static ?string $model = Partai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Form untuk Create / Edit Partai
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_partai')
                    ->label('Nama Partai')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('ketua_partai')
                    ->label('Ketua Partai')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('alamat_partai')
                    ->label('Alamat Partai')
                    ->rows(4)
                    ->maxLength(500)
                    ->nullable(),

                Forms\Components\TextInput::make('nomor_sk')
                    ->label('Nomor SK')
                    ->required()
                    ->maxLength(50),

                
            ]);
    }

    // Konfigurasi Tabel untuk View (List)
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_partai')
                    ->label('Nama Partai')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('ketua_partai')
                    ->label('Ketua Partai')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('alamat_partai')
                    ->label('Alamat')
                    ->limit(50),

                Tables\Columns\TextColumn::make('nomor_sk')
                    ->label('Nomor SK'),

               
            ])
            ->filters([
                // Filter Berdasarkan Tanggal Terdaftar
                Filter::make('tanggal_terdaftar')
                    ->label('Tanggal Terdaftar')
                    ->form([
                        Forms\Components\DatePicker::make('tanggal_terdaftar')
                            ->label('Tanggal Terdaftar'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when(
                            $data['tanggal_terdaftar'],
                            fn (Builder $q) => $q->whereDate('tanggal_terdaftar', $data['tanggal_terdaftar'])
                        );
                    }),
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
            // Tambahkan relation manager jika ada relasi ke model lain
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartais::route('/'),
            'create' => Pages\CreatePartai::route('/create'),
            'edit' => Pages\EditPartai::route('/{record}/edit'),
        ];
    }
}
