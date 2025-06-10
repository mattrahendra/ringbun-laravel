<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, DateTimePicker, Select, RichEditor};

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('slug')->required()->maxLength(255),

                // SEO
                TextInput::make('meta_title')->label('Meta Title')->maxLength(255),
                Textarea::make('meta_description')->label('Meta Description'),
                TextInput::make('meta_keywords')->label('Meta Keywords')->maxLength(255),

                // Content
                RichEditor::make('content')->required(),

                // Images
                FileUpload::make('image')
                    ->image()
                    ->directory('blogs/images'),

                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('blogs/thumbnails'),

                // Canonical URL
                TextInput::make('canonical_url')->label('Canonical URL')->maxLength(255),

                // Status
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->default('draft')
                    ->required(),

                // Type
                Select::make('type')
                    ->label('Tipe Blog')
                    ->options([
                        'blog' => 'Blog',
                        'event' => 'Event',
                        'promo' => 'Promo',
                    ])
                    ->default('blog')
                    ->required(),

                // Publish Date
                DateTimePicker::make('published_at')
                    ->label('Published At'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('type')->label('Tipe')->badge(),
                Tables\Columns\TextColumn::make('published_at')->dateTime(),
                Tables\Columns\ImageColumn::make('thumbnail')->label('Thumb'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Created'),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->label('Status'),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'blog' => 'Blog',
                        'event' => 'Event',
                        'promo' => 'Promo',
                    ])
                    ->label('Tipe'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
