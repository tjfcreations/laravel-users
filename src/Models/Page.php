<?php

namespace Tjall\Users\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Tjall\Users\Observers\PageObserver;

class Page extends Model {
    protected $guarded = [];

    protected $casts = [
        'content' => 'array'
    ];

    public static function allPublic() {
        return self::where('visibility', 'public')->get();
    }

    public function getPageTitle() {
        return $this->name;
    }

    public function getPageDescription() {
        return $this->name;
    }

    public function getDocumentTitle() {
        return $this->name;
    }

    public function getMetaTitle() {
        return $this->getPageTitle();
    }

    public function getMetaDescription() {
        return $this->name;
    }

    public function getMetaUrl() {
        return null;
    }

    public function getMetaImage() {
        return null;
    }

    public function getURL() {
        return '/' . trim($this->slug, '/');
    }

    public function render() {
        return view("laravel-users::page", [
            'page' => $this
        ]);
    }
}
