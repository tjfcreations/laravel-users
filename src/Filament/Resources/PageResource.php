<?php

namespace Tjall\Users\Filament\Resources;

use Tjall\Users\Filament\Resources\PageResource\Pages;
use Tjall\Users\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Tjall\Users\Forms\Components\PageBuilder;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'Beheer';
    protected static ?string $navigationLabel = 'Pagina\'s';
    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $label = 'pagina';
    protected static ?string $pluralLabel = 'pagina\'s';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Split::make([
                    Forms\Components\Section::make([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(255),
                            PageBuilder::make('builder')
                                ->columnSpanFull()
                        ])
                    ]),
                    Forms\Components\Section::make([
                        Forms\Components\Select::make('visibility') 
                            ->label('Zichtbaarheid')  
                            ->options([
                                'public' => 'Openbaar',
                                'hidden' => 'Verborgen'
                            ])
                            ->default('public')
                    ])->grow(false)
                ])->from('md')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
