<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug())),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload(),
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->default(auth()->id())
                            ->required(),
                        Textarea::make('excerpt')
                            ->rows(3),
                        RichEditor::make('body')
                            ->required(),
                    ]),

                Section::make('SEO & Media')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->image()
                            ->directory('blog'),
                        TextInput::make('meta_title'),
                        Textarea::make('meta_description')
                            ->rows(3),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_published')
                            ->required(),
                        DateTimePicker::make('published_at')
                            ->default(now()),
                    ]),
            ]);
    }
}
