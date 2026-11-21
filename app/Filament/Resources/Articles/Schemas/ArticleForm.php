<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('category')
                    ->required()
                    ->default('General'),
                TextInput::make('author_name')
                    ->required()
                    ->default('Astra Team'),
                TextInput::make('reading_time')
                    ->default('5 min read'),
                DateTimePicker::make('published_at'),
                Toggle::make('is_published')
                    ->default(true),
                FileUpload::make('image')
                    ->image()
                    ->directory('blog')
                    ->columnSpanFull(),
                Textarea::make('excerpt')
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->columnSpanFull(),
            ]);
    }
}
