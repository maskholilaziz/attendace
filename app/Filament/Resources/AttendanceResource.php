<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Attendance;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\Indicator;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AttendanceResource\Pages;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    // Menambahkan resource ini ke grup navigasi yang sudah ada
    protected static ?string $navigationGroup = 'Manajemen Karyawan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pegawai & Jadwal')
                    ->schema([
                        Placeholder::make('user_id')
                            ->label('Nama Pegawai')
                            ->content(fn($record): string => $record->user->name ?? '-'),

                        Placeholder::make('schedule_time')
                            ->label('Jadwal Shift')
                            ->content(function ($record): string {
                                $start = $record->schedule_start_time ? \Carbon\Carbon::parse($record->schedule_start_time)->format('H:i') : '-';
                                $end = $record->schedule_end_time ? \Carbon\Carbon::parse($record->schedule_end_time)->format('H:i') : '-';
                                return "{$start} - {$end}";
                            }),
                    ])->columns(2),

                Section::make('Detail Absensi')
                    ->schema([
                        Placeholder::make('clock_in')
                            ->label('Clock In (Masuk)')
                            ->content(fn($record): string => $record->start_time ? \Carbon\Carbon::parse($record->start_time)->format('H:i:s') : 'Belum Absen Masuk'),

                        Placeholder::make('clock_out')
                            ->label('Clock Out (Pulang)')
                            ->content(fn($record): string => $record->end_time ? \Carbon\Carbon::parse($record->end_time)->format('H:i:s') : 'Belum Absen Pulang'),

                        Placeholder::make('location_in')
                            ->label('Lokasi Clock In')
                            ->content(fn($record): string => $record->start_latitude ? "{$record->start_latitude}, {$record->start_longitude}" : '-'),

                        Placeholder::make('location_out')
                            ->label('Lokasi Clock Out')
                            ->content(fn($record): string => $record->end_latitude ? "{$record->end_latitude}, {$record->end_longitude}" : '-'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                // Logika ini sudah bagus, tidak perlu diubah
                $is_superadmin = auth()->user()->hasRole('super_admin');
                if (!$is_superadmin) {
                    $query->where('user_id', auth()->user()->id);
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->date('d F Y') // Format tanggal agar lebih mudah dibaca
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pegawai')
                    ->searchable() // Tambahkan fitur pencarian berdasarkan nama pegawai
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Clock In')
                    ->time('H:i:s') // Format sebagai waktu
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->label('Clock Out')
                    ->time('H:i:s')
                    ->sortable()
                    ->placeholder('Belum Clock Out'), // Teks jika data kosong
            ])
            ->filters([
                // Tambahkan filter berdasarkan rentang tanggal
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
