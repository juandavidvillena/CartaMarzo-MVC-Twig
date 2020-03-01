<?php

require_once 'librerias/Database.php';

class TipoPlato{

    private $idTipo;
    private $nom_Tipo;


    public function __construct(){}

    
    public function getIdTipo(){
        return $this->idTipo;
    }

    public function setIdTipo($idTipo){
        $this->idTipo = $idTipo;
        return $this;
    }

    public function getNomTipo(){
        return $this->nom_Tipo;
    }

    public function setNomTipo($nomTipo){
        $this->nom_Tipo = $nomTipo;
        return $this;
    }


    public static function listar(){
        $db= new Database();
        $db->query('SELECT * FROM Tipo_plato;');

        $data =[];
        while($tip = $db->getObject('TipoPlato')){
            array_push($data, $tip);
        }

        return $data;
    }
}