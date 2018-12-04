<?php

class FrontpageTemplate implements Template
{

    public function render(): String
    {
        $platzi= file_get_contents(__DIR__ . '/../html/produktContent.html');
        $template= file_get_contents(__DIR__ . '/../html/startseite.html');
        $site=str_replace("%placeholder%", $platzi, $template);

        return $site;
    }
}