<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
            ->required()
            ->maxLength(255),
            Select::make('category_id')
            ->relationship('category','name')
            ->required(),
            Select::make('status')
            ->options([
                'draft'=>'Taslak',
                'published'=>'Yayinlandi',
            ])
            ->default('draft'),
        ]);
    }
}