<?php
    namespace Tjall\Users\Forms\Components;

    use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

    class PageBuilderHeader extends Grid {
        protected function setUp(): void {
            parent::setUp();

            $this
                ->columns(2)
                ->schema([
                    TextInput::make('title')
                        ->label('Titel')
                        ->helperText('Deze titel wordt bovenaan de pagina weergegeven.')
                        ->columnSpanFull(),
                    Textarea::make('description')
                        ->label('Beschrijving')
                        ->helperText('Deze beschrijving wordt onder de paginatitel weergegeven.')
                        ->columnSpanFull()
                ]);
        }
    }