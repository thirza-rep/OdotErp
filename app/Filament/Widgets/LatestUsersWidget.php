<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestUsersWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Pendaftaran User Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Terdaftar')
                    ->dateTime()
                    ->badge(),
            ]);
    }
}
