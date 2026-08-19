<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Filament\Resources\Posts\Schemas\PostForm;
use App\Filament\Resources\Posts\Tables\PostsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Schema $schema): Schema
    {
        return PostForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return \App\Filament\Resources\Posts\Tables\PostsTable::configure($table);
    }
}
