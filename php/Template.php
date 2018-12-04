<?php

class Template
{

public function startseite(){
    $platzi= file_get_contents(__DIR__ . '/../html/produktContent.html');
    $template= file_get_contents(__DIR__ . '/../html/startseite.html');
    $site=str_replace("%placeholder%", $platzi, $template);

    return $site;
}

public function adminSectionLogin(){
    $platzi=file_get_contents(__DIR__ . '/../html/adminLogin.html');
    $template= file_get_contents(__DIR__ . '/../html/startseite.html');
    $site=str_replace("%placeholder%", $platzi, $template);

    return $site;
}

public function adminSectionStart(){
    $platzi=file_get_contents(__DIR__ . '/../html/adminSectionStart.html');
    $template= file_get_contents(__DIR__ . '/../html/startseite.html');
    $site=str_replace("%placeholder%", $platzi, $template);

    return $site;
}

public function bestellungErfolgreich(){
    $platzi=file_get_contents(__DIR__ . '/../html/bestellungErfolgreich.html');
    $template= file_get_contents(__DIR__ . '/../html/startseite.html');
    $site=str_replace("%placeholder%", $platzi, $template);
    return $site;
}

public function bestellungAusgeben($meldung){

    switch ($meldung){
        case "default":
            //Seitenerstaufruf, kein Modal nötig
            $meldung="";
            break;
        case "wrong_ext":
            $meldung="<p class='fehlerUpload'>Ungültige Dateiendung. Nur png, jpg und jpeg-Dateien sind erlaubt</p>";
            $meldungTemplate= file_get_contents(__DIR__ . '/../html/meldungSnippet.html');
            $meldung=str_replace("%meldungMessage%", $meldung, $meldungTemplate);
            break;
        case "wrong_res":
            $meldung="<p class='fehlerUpload'>Falsche Auflösung.</p>";
            $meldungTemplate= file_get_contents(__DIR__ . '/../html/meldungSnippet.html');
            $meldung=str_replace("%meldungMessage%", $meldung, $meldungTemplate);
            break;
        case "success":
            $meldung="<p class='fehlerUpload'>Upload erfolgreich!</p>";
            $meldungTemplate= file_get_contents(__DIR__ . '/../html/meldungSnippet.html');
            $meldung=str_replace("%meldungMessage%", $meldung, $meldungTemplate);
            break;
    }


    for ($i=0;$i<6;$i++){
        if (isset($_POST['flyerdaten'][$i])) {
            $flyerdaten[$i]=$_POST['flyerdaten'][$i];
        }
    }


    $bestellDetails= file_get_contents(__DIR__ . '/../html/bestellDetails.html');
    $details=str_replace(array("%produktArt%","%groesse%","%papstark%","%papglanz%","%menge%","%preis%", "%meldung%"),
        array($flyerdaten[0],$flyerdaten[1],$flyerdaten[2],$flyerdaten[3],$flyerdaten[4],$flyerdaten[5],$meldung ), $bestellDetails);


    $template= file_get_contents(__DIR__ . '/../html/startseite.html');
    $site=str_replace("%placeholder%", $details, $template);
    //<p>Some text in the Modal..</p>
    return $site;

}

public function adminTableOpenPage($platzhalter){

        $template = file_get_contents(__DIR__ . '/../html/admintable.html');
        $platzi =  str_replace("%platztable%",$platzhalter, $template);

        $template= file_get_contents(__DIR__ . '/../html/startseite.html');
        $site=str_replace("%placeholder%", $platzi, $template);
        return $site;


    }
}
