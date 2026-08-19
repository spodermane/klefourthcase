<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               TextInput::make('title')
               ->label('Başlık')
               ->live(onBlur:true)
               ->afterStateUpdated(fn(Set $set, $state) =>$set('slug',Str::slug($state)))
               ->required(),
               TextInput::make('slug')
               ->label('Slug')
               ->unique(ignoreRecord: true)
               ->required(),
               Select::make('category_id')
               ->relationship('category','name')
               ->label('Kategori')
               ->required(),
               RichEditor::make('content')
               ->label('İçerik')
               ->required()
               ->columnSpanFull(),
               Toggle::make('is_approved')
               ->label('Onay Durumu')
            ]);
    }
}
