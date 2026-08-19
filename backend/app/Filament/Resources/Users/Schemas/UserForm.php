<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('email'),
                TextInput::make('password')
                ->password()
                ->required(),
                Select::make('roles')
                ->relationship('roles','name')
                ->multiple()
                ->preload()
                ->label('Roller'),
            ]);
    }
}
