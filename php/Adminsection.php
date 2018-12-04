<?php

class Adminsection
{

    public function passwordValidation($pwtable)
    {

        $passwort = $_POST['password'];

        if (password_verify($passwort, $pwtable[0])) {
            return true;
        } else {
            return false;
        }

    }

   public function adminTableOpen($connect, $result)
    {

        $platzhalter = "";
        while ($row = mysqli_fetch_array($result)) {
            $platzhalter .=
                '<tr>
             <td>' . $row["id"] . '</td>
             <td>' . $row["produktArt"] . '</td>
             <td>' . $row["produktVariation"] . '</td>
             <td>' . $row['papierStark'] . ' ' . $row['papierGlanz'] .'</td>
             <td>' . $row['produktMenge'] . '</td>
             <td>' . $row['preis'] . '</td>
             <td><a href='.$row['datei'].'>Datei anzeigen</a></td>
             </tr>
             <input type="hidden" name="idfield" value=' . $row['id'] . '>
             </form>';
        }
        mysqli_close($connect);
        return $platzhalter;

    }
    /*

        function adminAccountTableOpen($connect)
        {

            $platzhalter = "";
            while ($row = mysqli_fetch_array($result)) {
                $platzhalter .=
                    '<tr>
                 <td>' . $row["user"] . '</td>
                 <form action="../public/index.php" method="post">
                 <td class="verschiebrow"><input type="submit" name="page" value="Löschen" class="tablebuttons"></td>
                 </tr>
                 <input type="hidden" name="idfield" value=' . $row['id'] . '>
                 </form>';
            }
            mysqli_close($connect);
            return $platzhalter;

        }




        function samePassword(){
            $pw1=$_POST['passwordCreationOne'];
            $pw2=$_POST['passwordCreationTwo'];

            if ($pw1==$pw2){
                return true;
            }else{
                return false;
            }
        }
    */



}

?>