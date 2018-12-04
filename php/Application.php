<?php


class Application
{
    private $router;

    public function __construct(router  $router){
        $this->router=$router;
    }

    function run($page)
    {
        echo $this->router->getRoute($page);

    }

}


?>