<?php
    namespace Tjall\Users\PageBuilder\Fields;

use Filament\Forms\Components\TextInput;

    class TextInputField extends Field {
        public static string $type = 'text_input';

        public static function getName(): string {
            return 'Tekstinvoer';
        }

        public function getSchema() {
            return TextInput::make($this->data['key'])
                ->label($this->data['label']);
        }
    }