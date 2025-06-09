<?php

namespace Tjall\Users\Filament\Resources;

use Tjall\Users\Filament\Resources\BlockResource\Pages;
use Tjall\Users\Filament\Resources\BlockResource\RelationManagers;
use Tjall\Users\Models\Block;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Tjall\Users\PageBuilder\Fields;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;

    protected static ?string $navigationGroup = 'Beheer';
    protected static ?string $navigationLabel = 'Blokken';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'blok';
    protected static ?string $pluralLabel = 'blokken';

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
                                    ->label('Naam')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Mijn blok'),
                                Forms\Components\TextInput::make('key')
                                    ->label('Sleutel')
                                    ->required()
                                    ->placeholder('mijn_blok')
                            ]),
                        Forms\Components\Repeater::make('content')
                            ->schema([
                                self::getFieldSchema()
                            ])
                    ]),
                    Forms\Components\Section::make([
                        Forms\Components\Toggle::make('enabled')    
                            ->default(true)
                    ])->grow(false)
                ])->from('md')
            ]);
    }

    protected static function getFieldSchema() {
        $types = [];

        foreach(Fields::all() as $field_class) {
            $types[$field_class::$type] = $field_class::getName();
        }

        return Grid::make(2)
            ->schema([
                Select::make('type')
                    ->label('Type')
                    ->options($types)
                    ->reactive()
                    ->columnSpanFull(),
                TextInput::make('label')
                    ->label('Label'),
                TextInput::make('key')
                    ->label('Key'),
                Forms\Components\Textarea::make('options')
                    ->label('Options')
                    ->columnSpanFull()
                    ->visible(fn (callable $get) => $get('type') === 'select')
                    ->helperText('Place each option on a new line, e.g. \'label=value\'.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Naam'),
                TextColumn::make('key')
                    ->label('Sleutel')
            ])
            ->filters([
                //
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
            'index' => Pages\ListBlocks::route('/'),
            'create' => Pages\CreateBlock::route('/create'),
            'edit' => Pages\EditBlock::route('/{record}/edit'),
        ];
    }
}
