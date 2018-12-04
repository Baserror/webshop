<?php
class Factory
{
    public function createApplication()
    {

        require_once("Router.php");

        return new Application(

            $this->createRouter()
        );
    }





    private function createRouter(){
        require_once("Template.php");
        require_once("DatabaseConnection.php");
        require_once("SqlReader.php");
        require_once ("Adminsection.php");
        require_once ("Upload.php");
        require_once ("SqlWriter.php");
        return new Router(
            $this->createDatabaseConnection(),
            $this->createSqlReader(),
            $this->createAdminsection(),
            $this->createUpload(),
            $this->createSqlWriter()
        );
    }


    private function createDatabaseConnection()
    {

        return new DatabaseConnection();
    }


    private function createSqlReader()
    {
        return new SqlReader();
    }


    private function createAdminsection()
    {
        return new Adminsection();
    }

    private function createUpload()
    {
        return new Upload();
    }

    private function createSqlWriter()
    {
        return new SqlWriter();
    }

}

?>