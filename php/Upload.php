<?php
/**
 * Created by PhpStorm.
 * User: b.beeker
 * Date: 01.08.18
 * Time: 14:17
 */

class Upload
{

    /**
     * @return string
     */
public function getWidth($papgroesse){
    switch ($papgroesse){
        case "A2":
            $width=7016;
            break;
        case "A3":
            $width=4961;
            break;
        case "A4":
            $width=1914;
            break;
        case "A6":
            $width=1748;
            break;
        case "A7":
            $width=1240;
            break;
    }
    return $width;
}

    public function getHeight($papgroesse){
        switch ($papgroesse){
            case "A2":
                $height=4961;
                break;
            case "A3":
                $height=3508;
                break;
            case "A4":
                $height=1210;
                break;
            case "A6":
                $height=1240;
                break;
            case "A7":
                $height=874;
                break;
        }
        return $height;
    }


    public function extensionCheck($extension){
        $allowed_extensions = array('png', 'jpg', 'jpeg');
        if(!in_array($extension, $allowed_extensions)) {

            return false;
        }else{
            return true;
        }
    }

    public function checkFileExist ($uploadDaten){

        //Pfad zum Upload
        $new_path = $uploadDaten[0].$uploadDaten[1].'.'.$uploadDaten[2];

//Neuer Dateiname falls die Datei bereits existiert
        if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
            $id = 1;
            do {
                $new_path = $uploadDaten[0].$uploadDaten[1].'_'.$id.'.'.$uploadDaten[2];
                $id++;
            } while(file_exists($new_path));
        }

        return $new_path;

    }

    public function checkResolution($shouldWidth, $shouldHeight){

        $filename = $_FILES['datei']['tmp_name'];
        list($realWidth, $realHeight) = getimagesize($filename);

        if ($realWidth==$shouldWidth && $realHeight==$shouldHeight){
            return true;
        }else{
            return false;
        }

    }

    function uploadDatei($new_path){


//uploadDaten [0]=upload-Folder, [1]=filename, [2]=extension

//Alles okay, verschiebe Datei an neuen Pfad
        if (move_uploaded_file($_FILES['datei']['tmp_name'], $new_path)) {
            echo '<a href="' . $new_path . '">' . $new_path . '</a>';
            return true;
        }
    }

    public function uploadVariablen(){

        $uploadDaten[0] = 'upload/'; //Das Upload-Verzeichnis
        $uploadDaten[1] = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
        $uploadDaten[2] = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));

        return $uploadDaten;

    }



}