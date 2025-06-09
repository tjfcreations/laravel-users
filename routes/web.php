<?php

use Tjall\Users\Models\Page;
use Illuminate\Support\Facades\Route;

foreach(Page::allPublic() as $page) {
    Route::get($page->getURL(), function () use($page) {
        return $page->render();
    });
}