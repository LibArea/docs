<?php

/*
 *  Mapping to autoload classes: namespace => realpath
 *
 *  Сопоставление для автозагрузки классов: namespace => realpath
 */

namespace App\Optional;

use Hleb\Scheme\Home\Main\Connector;

class MainConnector implements Connector
{
    public function add() {
        return [
            "App\Controllers\*" => "app/Controllers/",
            "App\Commands\*" => "app/Commands/",
            "Translate" => "app/Libraries/Translate.php",
            "Content" => "app/Libraries/Content.php",
            "Data" => "app/Libraries/Data.php",
        ];
    }
}
