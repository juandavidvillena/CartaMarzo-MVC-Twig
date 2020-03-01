<?php

require_once 'librerias/Database.php';

class Plato{

    private $idPlato;
    private $nombre;
    private $foto;
    private $ingredientes;
    private $precio;
    private $alergeno;
    private $disponible;
    private $tipo_plato;


    public function __construct(){

    }

    
    //Getters u Setters de las propiedades de nuestro objeto Plato
    public function getIdPlato(){
        return $this->idPlato;
    }

    public function setIdPlato($idPlato){
        $this->idPlato = $idPlato;
        return $this;
    }

    public function getIdTipo(){
        return $this->idTipo;
    }

    public function setIdTipo($idTipo){
        $this->idTipo = $idTipo;
        return $this;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function getIngredientes(){
        return $this->ingredientes;
    }

    public function setIngredientes($ingredientes){
        $this->ingredientes = $ingredientes;
        return $this;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }

    public function getAlergeno(){
        return $this->alergeno;
    }

    public function setAlergeno($alergeno){
        $this->alergeno = $alergeno;
        return $this;
    }

    public function getDisponible(){
        return $this->disponible;
    }

    public function setDisponible($disponible){
        $this->disponible = $disponible;
        return $this;
    }
    public function getTipoPlato(){
        return $this->tipoPlato;
    }

    public function setTipoPlato($tipoPlato){
        $this->tipoPlato = $tipoPlato;
        return $this;
    }


    public static function listarPlato(){
        $db= new Database();
        $db->query('SELECT * FROM Plato;');

        $data =[];
        while($plato = $db->getObject('Plato')){
            array_push($data, $plato);
        }

        return $data;
    }

    public static function verPlato(int $idPlato):Plato {
        $db = new Database();
        $db->query('SELECT * FROM Plato WHERE idPlato = '.$idPlato.';');

        return $db->getObject('Plato');
    }

    public function grabarDB(){
        $db = new Database();
        if (is_null($this->idPlato)):

            // insertamos en la base de datos
            $query = "INSERT INTO plato (nombre, foto, ingredientes, precio, disponible, alergeno, idTipo) VALUES ('{$this->nombre}', NULL ,'{$this->ingredientes}','{$this->precio}',1,'{$this->alergeno}',{$this->tipoPlato}) ;";
            //var_dump($this);
            //die();
            $db->query($query) ;
        else:
            $db->query("UPDATE plato SET nombre='{$this->nombre}',ingredientes='{$this->ingredientes}', precio={$this->precio}, alergeno='{$this->alergeno}' WHERE idPlato={$this->idPlato} ;") ;
        endif ;

        return $this ;
    }

    public function delete(){
        $db = new Database();
    $db->query("DELETE FROM plato WHERE idPlato={$this->idPlato};");
    }


}