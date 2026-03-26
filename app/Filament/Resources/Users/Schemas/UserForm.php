<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->disabled(fn($record) => $record !== null && auth()->id() !== $record->id)
                    ->dehydrated(fn($record) => $record === null || auth()->id() === $record->id),

                TextInput::make('username')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->live(debounce: 500)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('sub_domain', Str::slug($state));
                    }),

                TextInput::make('sub_domain')
                    ->disabled()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->prefix('https://filament-blog.test/'),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('password')
                    ->password()
                    ->required(fn(string $operation) => $operation === 'create')
                    ->minLength(4)
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->confirmed()
                    ->visible(fn($record, string $operation) => $operation !== 'view' && ($record === null || auth()->id() === $record->id)),

                TextInput::make('password_confirmation')
                    ->password()
                    ->required(fn(string $operation) => $operation === 'create')
                    ->dehydrated(false)
                    ->visible(fn($record, string $operation) => $operation !== 'view' && ($record === null || auth()->id() === $record->id)),

                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->visible(fn() => auth()->user()?->hasRole('admin')),
            ]);
    }
}
