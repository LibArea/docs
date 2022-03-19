<?php

namespace App\Controllers;

use Hleb\Scheme\App\Controllers\MainController;
use Hleb\Constructor\Handlers\Request;
use Data, Content;

class ArticleController extends MainController
{
    public function index($slug)
    {
        if (!in_array($lang = Request::get('lang'), Data::LANG)) {
            redirect('/');
        }

        Data::lang($lang);

        if (!$file = 'files/' . $lang . '/' . $slug . '.md') {
            return false;
        }

        $contents = Content::text($file);

        preg_match_all("/<h1>(.*?)<\/h1>/", $contents, $matches);
        $title = $matches[1][0];

        $telo  = explode("\n", $contents);
        $desc  = strip_tags($telo[1]);

        $cnt = Content::headings($contents, $lang);

        return view(
            '/article',
            [
                'title' => $title,
                'desc'  => $desc,
                'type'  => $slug,
                'data'  => [
                    'contents'  => $cnt['text'],
                    'headings'  => $cnt['head'],
                ],
            ],
        );
    }
}
