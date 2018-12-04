
<?php
require_once("../php/Factory.php");
require_once("../php/Application.php");

if (empty($_POST["page"])){
    $page="";
}else{
    $page = $_POST["page"];
}


$application=(new factory())->createApplication();
$application->run($page);


?>
