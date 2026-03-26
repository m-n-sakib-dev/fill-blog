<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return [
                Stat::make('Total Articles', Article::count())
                    ->color('success')
                    ->description('Articles published')
                    ->descriptionIcon('heroicon-m-arrow-trending-up'),
                Stat::make('Total Categories', Category::count())
                    ->description('All categories')
                    ->descriptionIcon('heroicon-m-tag')
                    ->color('info'),
                Stat::make('Total Authors', User::count())
                    ->description('Active users')
                    ->descriptionIcon('heroicon-m-users')
                    ->color('warning'),
            ];
        }

        return [
            Stat::make('My Articles', Article::where('user_id', $user->id)->count())
                ->color('success')
                ->description('Your published articles')
                ->descriptionIcon('heroicon-m-document-text'),
        ];
    }
}
