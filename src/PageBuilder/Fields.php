<?php
namespace Tjall\Users\PageBuilder;

use Tjall\Users\PageBuilder\Fields\RichEditorField;
use Tjall\Users\PageBuilder\Fields\TextInputField;

class Fields {
    public static function all() {
        return [
            TextInputField::class,
            RichEditorField::class
        ];
    }

    public static function get(string $type) {
        foreach(self::all() as $field_class) {
            if($field_class::$type === $type) {
                return $field_class;
            }
        }
        
        return null;
    }
}