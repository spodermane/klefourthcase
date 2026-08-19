<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Schemas\Schema;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Forms\Components\TextInput;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->label('Rol Adı')
                ->required()
                ->unique(ignoreRecord: true),
            ]);
    }
}
