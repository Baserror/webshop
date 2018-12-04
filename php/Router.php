<?php

class Router
{
    private $template;
    private $database;
    private $read;
    private $admin;
    private $upload;
    private $write;

    public function __construct(

        Template $template,
        DatabaseConnection $database,
        SqlReader $read,
        Adminsection $admin,
        Upload $upload,
        SqlWriter $write
    )
    {
        $this->template = $template;
        $this->database = $database;
        $this->read = $read;
        $this->admin =$admin;
        $this->upload=$upload;
        $this->write=$write;
    }


    public function getRoute($page)
    {

        if (empty($page)) {
            $page = "default";
        } else {

        }
        switch ($page) {

            case "default":
                return $this->template->startseite();
                break;

            case "das":
                return $this->template->adminSectionLogin();
                break;

            case"login":
                if ($this->admin->passwordValidation(
                    $this->read->getPassword(
                        $this->database->getConnection())) == true) {
                                return $this->template->adminTableOpenPage(
                                    $this->admin->adminTableOpen(
                                        $this->database->getConnection(),$this->read->getAdminTableContent(
                                            $this->database->getConnection())));
                            }else{
                            return $this->template->adminSectionLogin();
                        }

            case "Bestellen":
                    return $this->template->bestellungAusgeben("default");
                break;

            case "Hochladen & Bestellen":
                    $uploaddaten = $this->upload->uploadVariablen();
                        if ($this->upload->extensionCheck($uploaddaten[2])){
                            if ($this->upload->checkResolution($this->upload->getWidth(
                                $_POST["flyerdaten"[1]]),$this->upload->getHeight($_POST["flyerdaten[1]"]))){
                                if ($this->upload->uploadDatei($newpath=$this->upload->checkFileExist($uploaddaten))){
                                    $upload="success";
                                }

                            }else{
                                $upload="wrong_res";
                            }
                        }else{
                            $upload="wrong_ext";
                        }

                        if ($upload=="success"){
                            $this->write->writeCustomer($this->database->getConnection(), $newpath);
                            return $this->template->bestellungErfolgreich();
                        }else{
                            return $this->template->bestellungAusgeben($upload);
                        }
                break;

            case "Startseite":
                $this->template->startseite();
                break;
                    }

        // @codeCoverageIgnoreStart
    }
    // @codeCoverageIgnoreEnd
}