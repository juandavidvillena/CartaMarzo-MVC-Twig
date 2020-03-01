<?php
require_once "vendor/autoload.php" ;

class PlantillaController{
    protected $twig;
    public function __construct(){
        $loader = new \Twig\Loader\FilesystemLoader("./vista") ;

        // instanciamos TWIG.
        $this->twig   = new \Twig\Environment($loader) ;
    }
}
