<?php
    namespace Tjall\Users\Forms\Components;

    use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

    class PageBuilder extends Tabs {
        protected function setUp(): void {
            parent::setUp();

            $this
                ->tabs([
                    Tab::make('Inhoud')
                        ->schema([
                            PageBuilderContent::make('content')
                        ]),
                    Tab::make('Header')
                        ->schema([
                            PageBuilderHeader::make('header')
                        ])
                ]);
        }
    }