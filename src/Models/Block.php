<?php

namespace Tjall\Users\Models;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Tjall\Users\PageBuilder\Fields;

class Block extends Model {
    protected $table = 'pagebuilder_blocks';

    protected $guarded = [];

    protected $casts = [
        'content' => 'array'
    ];

    public static function allEnabled() {
        return self::where('enabled', true)->get();
    }

    public function getSchema(): BuilderBlock {
        $schema = [];
        
        foreach($this->content as $data) {
            $field_class = Fields::get($data['type']);
            if(!$field_class) continue;

            $field = new $field_class($data);
            $schema[] = $field->getSchema();
        }

        return BuilderBlock::make($this->key)
            ->label($this->name)
            ->schema($schema);
    }
}
