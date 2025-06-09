<?php
    namespace Tjall\Users\Forms\Components;

    use Filament\Forms\Components\Builder;
    use Tjall\Users\Models\Block;

    class PageBuilderContent extends Builder {
        protected function setUp(): void {
            parent::setup();
            
            $this
                ->hiddenLabel()
                ->blocks(function() {
                    return collect(Block::allEnabled())
                        ->map(fn($block) => $block->getSchema())
                        ->toArray();
                });
        }
    }