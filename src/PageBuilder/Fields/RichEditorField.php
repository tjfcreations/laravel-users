<?php
    namespace Tjall\Users\PageBuilder\Fields;

    use Filament\Forms\Components\RichEditor;

    class RichEditorField extends Field {
        public static string $type = 'rich-editor';
        
        public static function getName(): string {
            return 'WYSIWYG-teksteditor';
        }

        public function getSchema() {
            return RichEditor::make($this->data['key'])
                ->label($this->data['label']);
        }
    }