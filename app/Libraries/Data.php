<?php

// Constants to use
class Data
{
    const LANG = ['ru', 'en'];
    const DEFAULT_LANG = ['ru', 'en'];

    const NAME =  'LibArea';

    const LOGO_BIG = '<img class="logo" alt="LibArea" src="/assets/images/LibArea_limpid.png">';
    const LOGO_SMALL = '<a title="LibArea" href="/">LibArea</a>';

    public static function lang($lang = 'ru')
    {
        $lang = $lang ?? self::DEFAULT_LANG;
        Translate::setLang($lang);
    }
}
