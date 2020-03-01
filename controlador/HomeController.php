<?php

require_once 'PlantillaController.php';
require_once 'librerias/Routing.php';
require_once 'modelo/Usuario.php';



class HomeController extends PlantillaController{

    public function __construct(){

        parent::__construct();
    }


    public function listar(){
        
            echo $this->twig->render("home.php.twig");
    }

    public function reserva(){
        echo $this->twig->render('reservar.php.twig');
    }

    public function home(){
        echo $this->twig->render('cartaElectronica.php.twig');

    }



}