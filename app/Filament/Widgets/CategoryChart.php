<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Category;

class CategoryChart extends ChartWidget
{
    protected ?string $heading = 'Articles by Category';
    protected static ?int $sort = 3;

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('admin') ?? false;
    }

    protected function getData(): array
    {
        $categories = Category::withCount('articles')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Article Count',
                    'data' => $categories->pluck('articles_count')->toArray(),
                    'backgroundColor' => ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0'],
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
