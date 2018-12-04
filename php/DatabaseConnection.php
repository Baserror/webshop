<?php

class DatabaseConnection
{

    private $connection = null;

    public function getConnection()
    {

            if ($this->connection = mysqli_connect(
                "beeker.vm", "homestead", "secret", "fleaf")){
            }else{
                echo "no :(";
            }

        return $this->connection;
    }

}