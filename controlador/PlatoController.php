<?php

require_once 'modelo/Plato.php';
require_once 'PlantillaController.php';
require_once 'librerias/Routing.php';
require_once 'modelo/TipoPlato.php';

class PlatoController extends PlantillaController{


    public function __construct(){ parent::__construct(); }


    public function listar(){
        $pla = Plato::listarPlato();
        echo $this->twig->render("verPlato.php.twig", ['pla' => $pla]);
    }

    public function pintar(){
        $pla = Plato::listarPlato();
        echo $this->twig->render("carta.php.twig", ['pla' => $pla]);
    }


    public function editar(){

        $pla = Plato::verPlato($_GET["id"]) ;

			if (!isset($_GET["nombre"])):

				// mostramos el formulario de edición
                //require_once "vistas/editBoard.php" ;
                
				echo $this->twig->render("editarPlato.php.twig",['pla' => $pla] ) ;
			else:

				// actualizar la información en la 
				// base de datos.
				$nombre = $_GET["nombre"] ;
                $precio = $_GET["precio"] ;
                $alergeno = $_GET["alergeno"] ;
				$ingredientes = $_GET["ingredientes"] ;

				// actualizar los datos
				$pla->setNombre($nombre) ;
                $pla->setPrecio($precio) ;
                $pla->setAlergeno($alergeno) ;
                $pla->setIngredientes($ingredientes) ;


				// refrescar el objeto en la base de datos
				$pla->grabarDB() ;
				
				// redirigimos a la página principal
				route('index.php', 'plato', 'listar') ;				
			endif ;
    }

    public function borrar(){
        $id= $_GET["id"];
        $pla = Plato::verPlato($id);
        $pla->delete();

        route('index.php', 'plato', 'listar') ;				  
    }

    public function anadir(){
        if(!isset($_GET["nombre"])){
            $tip = TipoPlato::listar();
            //var_dump($tip);
            echo $this->twig->render("crearPlato.php.twig",['tip' => $tip] ) ;
        }else{
            $nombre = $_GET["nombre"] ;
            $precio = $_GET["precio"] ;
            $alergeno = $_GET["alergeno"] ;
            $ingredientes = $_GET["ingredientes"] ;
            $tipo = $_GET["tipoplato"] ; 
            
            $plato = new Plato();
            $plato->setNombre($nombre);
            $plato->setPrecio($precio);
            $plato->setAlergeno($alergeno);
            $plato->setIngredientes($ingredientes);
            $plato->setTipoPlato($tipo);
            $plato->grabarDB();

            route('index.php', 'plato', 'listar');
        }
        
    }



}