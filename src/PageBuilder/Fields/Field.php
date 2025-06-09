<?php
namespace Tjall\Users\PageBuilder\Fields;

class Field {
    public static string $type = 'field';
    protected array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function getName(): string {
        return '';
    }

    public function getSchema() {

    }
}