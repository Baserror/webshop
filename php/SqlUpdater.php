<?php

class SqlUpdater
{

    public function updateToStatus($verb, $status) {
        $id=$_POST["idfield"];
        $sql = "UPDATE Bestellung SET status='$status' WHERE id='$id' ";

        if (mysqli_query($verb, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($verb);
        }

        mysqli_close($verb);
    }



}