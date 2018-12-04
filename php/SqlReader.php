<?php

class SqlReader
{

    /*public function usernameAvailable($connect)
    {
        $username = $_POST['username'];
        $sql = "SELECT user FROM user WHERE user='$username'";

        $result = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            return true;
        } else {
            return false;
        }
    }*/

    /**
     * @param $db
     * @return array|null
     */

    public function getPassword($db){

        $user = $_POST["user"];
        $sql = "SELECT password FROM user WHERE user='$user'";
        $result = mysqli_query($db, $sql);
        $pwtable = mysqli_fetch_row($result);
        return $pwtable;
    }

    public function getAdminTableContent($connect){
        $result = mysqli_query($connect, "SELECT * FROM Bestellungen");
        return $result;
}

    /*public function getAccountTableContent($connect){
        $result = mysqli_query($connect, "SELECT * FROM user");
        return $result;
    }*/

}