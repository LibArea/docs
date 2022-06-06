<?php

class Content
{
    public static function text($path)
    {
        if (!$path) {
            return false;
        }

        $content =  file_get_contents(HLEB_DIR . $path);

        return self::parser($content, 'text');
    }

    // Parsedown
    public static function parser($content, $type)
    {
        $Parsedown = new Parsedown();
        $Parsedown->setSafeMode(true);

        if ($type  == 'text') {
            return $Parsedown->text($content);
        }

        return $Parsedown->line($content);
    }

    // Parsedown
    public static function headings($html_string, $lang, $slug)
    {
        // Let's make at least 1 h1, h2... heading, mandatory 
        if (!preg_match_all('#<h([1-5])>(.*?)</h[1-5]>#', $html_string, $resultats)) {
            return;
        }

        $base = '/' . $lang . '/';
        $from = $to = array();
        $depth = 0;
        $start = null;

        $head = '<ul id="box-head" class="list-none">';
        foreach ($resultats[2] as $i => $header) {
            $header = preg_replace('#\s+#', ' ', trim(rtrim($header, ':!.?;')));
            $anchor = str_replace(' ', '-', $header);
            $header = "<a href=\"{$base}/{$slug}#{$anchor}\">{$header}</a>";

            if ($depth > 0) {
                if ($resultats[1][$i] > $depth) {
                    while ($resultats[1][$i] > $depth) {
                        $head .= '<ul>';
                        $depth++;
                    }
                } elseif ($resultats[1][$i] < $depth) {
                    while ($resultats[1][$i] < $depth) {
                        $head .= '</ul>';
                        $depth--;
                    }
                }
            }
            $depth = $resultats[1][$i];
            if ($start === null) {
                $start = $depth;
            }
            $head .= '<li>' . $header . '</li>';

            $from[$i] = $resultats[0][$i];
            $to[$i] = '<a class="anchor" name="' . $anchor . '">' . $resultats[0][$i] . '</a>';
        }
        // Closing all open lists 
        for ($i = 0; $i <= ($depth - $start); $i++) {
            $head .= "</ul>";
        }
        // Adding Anchors to Headings
        $text = str_replace($from, $to, $html_string);

        return $data = ['head' => $head, 'text' => $text];
    }
}
