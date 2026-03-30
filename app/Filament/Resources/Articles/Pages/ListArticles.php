<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    public function mount(): void
    {
        parent::mount();

        $user = auth()->user();

        if (! $user->username && ! $user->hasRole('admin')) {
            Notification::make()
                ->warning()
                ->title('Username required')
                ->body('You must set a username from your Profile page before you can create articles.')
                ->persistent()
                ->actions([
                    Action::make('go_to_profile')
                        ->label('Go to Profile')
                        ->url(UserResource::getUrl('edit', ['record' => $user->id]))
                        ->button(),
                ])
                ->send();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(fn() => auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')),
        ];
    }
}
