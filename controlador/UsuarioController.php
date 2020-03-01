<?php
require_once 'modelo/Usuario.php';
require_once 'PlantillaController.php';
require_once 'librerias/Routing.php';

class UsuarioController extends PlantillaController{

    public function __construct(){

        parent::__construct();
    }


    public function index(){
        
        echo $this->twig->render("login.php.twig", ['error' => false]);
    }

    public function login(){
        
        //if es admin ... if not ...
        //var_dump($_POST);

        $email = $_GET['email'];
        $pass =  $_GET['pass'];

        
        $usuario =  new Usuario();
        $usuario->iniciarSesion($email,$pass);
        $user = $usuario->iniciarSesion($email,$pass);
        if($usuario->iniciarSesion($email,$pass)==false){
            echo $this->twig->render("login.php.twig", ['error' => true]);
        }else{
            $user->getEsAdmin();
            if( $user->getEsAdmin() == '1'){
                echo $this->twig->render("home.php.twig");
            }else{
                echo $this->twig->render('cartaElectronica.php.twig');
            }
            
        }

        

//echo $this->twig->render('verPlato.php.twig');

    }



}