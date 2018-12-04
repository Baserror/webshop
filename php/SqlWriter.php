<?php

class SqlWriter
{


    public function writeCustomer($connect, $new_path){

        for ($i=0;$i<6;$i++){
            if (isset($_POST['kundendaten'][$i])) {
                $kundendaten[$i]=$_POST['kundendaten'][$i];
            }
        }

        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql1 = "SELECT Email FROM Kunden WHERE Email='$kundendaten[2]'";
        $result = mysqli_query($connect, $sql1);
        if (mysqli_num_rows($result)==0) {

            $sql = "INSERT INTO Kunden (Name, Vorname, Email, StrasseHN, Plz, Ort) VALUES ('$kundendaten[0]',
                          '$kundendaten[1]', '$kundendaten[2]', '$kundendaten[3]', '$kundendaten[4]', '$kundendaten[5]')";
            if (mysqli_query($connect, $sql)) {
                $customerID=mysqli_insert_id($connect);
            } else {
                echo "Daten konnten nicht eingetragen werden". mysqli_error($connect);
            }

        }else{

            $findCustomerID = "SELECT id FROM Kunden WHERE Email='$kundendaten[2]'";
            if ($result=mysqli_query($connect, $findCustomerID)) {
                $customerID=mysqli_fetch_array($result);
                $customerID = $customerID[0];
            } else {
                echo "Daten konnten nicht eingetragen werden". mysqli_error($connect);
            }

        }


        for ($i=0;$i<6;$i++){
            if (isset($_POST['flyerdaten'][$i])) {
                $flyerdaten[$i]=$_POST['flyerdaten'][$i];
            }
        }


            $flyerdatenInDatenbank = "INSERT INTO Bestellungen (produktArt, produktVariation, papierStark,
                                      papierGlanz, produktMenge, preis, kundenID, datei) 
                                      VALUES ('$flyerdaten[0]', '$flyerdaten[1]', '$flyerdaten[2]',
                                       '$flyerdaten[3]', '$flyerdaten[4]', '$flyerdaten[5]','$customerID', '$new_path')";

            if (mysqli_query($connect, $flyerdatenInDatenbank)) {
            } else {
                echo "Daten konnten nicht blalbl werden". mysqli_error($connect);
            }


        mysqli_close($connect);

    }

    public function writeInformation($verb)
    {
     for ($i=0;$i<8;$i++){
        if (isset($_POST['content'][$i])) {
            $var[$i]=$_POST['content'][$i];
        }
    }
        if (!$verb) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO Bestellung (mail, firma, vorname, nachname, strassehnr, plz, stadt, telefon, status) 
                VALUES ('$var[0]', '$var[1]', '$var[2]', '$var[3]', '$var[4]', '$var[5]', '$var[6]', '$var[7]', 'offen')";
        if (mysqli_query($verb, $sql)) {
            echo "";
        } else {
            $_POST["page"]="patternRequestPage";
        }

        mysqli_close($verb);


    }

    function writeNewAccount($connect){
        $username=$_POST['username'];
        $password=password_hash($_POST['passwordCreationOne'], PASSWORD_DEFAULT);
        $sql="INSERT INTO user (user, password) VALUES ('$username', '$password')";

        if (mysqli_query($connect, $sql)) {
            echo "";
        }

        mysqli_close($connect);

    }
}