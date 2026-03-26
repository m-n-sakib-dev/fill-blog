<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Article;
use Filament\Tables\Columns\TextColumn;

class LatestArticles extends TableWidget
{
    protected static ?int $sort = 2;

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('admin') ?? false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Article::query()->with(['category', 'user'])
                ->latest()
                ->limit(5))
            ->columns([
                TextColumn::make('title')->limit(30)->label('Title'),
                TextColumn::make('category.name')
                    ->badge()
                    ->color('success')
                    ->label('Category'),
                TextColumn::make('user.name')
                    ->label('Author'),
            ])
            ->filters([])
            ->headerActions([])
            ->recordActions([])
            ->toolbarActions([
                BulkActionGroup::make([]),
            ]);
    }
}
