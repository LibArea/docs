<?php

namespace App\Controllers;

use Hleb\Scheme\App\Controllers\MainController;
use Translate;

class HomeController extends MainController
{
    public function index()
    {
        return view(
            '/index',
            [
                'title' => Translate::get('index.title'),
                'desc'  => Translate::get('index.desc'),
                'help'  => Translate::get('index.help'),
                'type'  => 'main',
            ],
        );
    }
}
