<?php

namespace App\Filament\Resources\Comments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;


class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema([
            Select::make('post_id')
            ->label('Yazı Seçin')
            ->relationship('post','title')
            ->getOptionLabelFromRecordUsing(fn($record)=>"{$record->title} ({$record->category->name})")
            ->required(),
            Select::make('user_id')
            ->label('Kullanıcı')
            ->relationship('user','name')
            ->required(),
            Textarea::make('comment')
            ->label('Yorum Metni')
            ->required()
            ->columnSpanFull(),
            Toggle::make('is_approved')
            ->label('Onay Durumu')
            ->default(false),
        ]);
    }
    
}

