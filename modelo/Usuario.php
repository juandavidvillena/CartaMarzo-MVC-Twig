<?php

    require_once 'librerias/Database.php';

	class Usuario
	{
		private $idUsu ;
		private $idCom;
		private $email ;
		private $nombre ;
		private $telefono ;
		private $foto ;
		private $es_admin ;

		public function __construct() { }

	    public function getIdUsu()
	    {
	        return $this->idUsu;
	    }

	    public function setIdUsu($idUsu)
	    {
	        $this->idUsu = $idUsu;

	        return $this;
	    }


	    public function getEmail()
	    {
	        return $this->email;
	    }

	    public function setEmail($email)
	    {
	        $this->email = $email;

	        return $this;
	    }

	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
	    }

	    public function getIdCom()
	    {
	        return $this->idCom;
	    }

	    public function setIdCom($idCom)
	    {
	        $this->idCom = $idCom;

	        return $this;
	    }

	  
	    public function getTelefono()
	    {
	        return $this->telefono;
	    }

	 
	    public function setTelefono($telefono)
	    {
	        $this->telefono = $telefono;

	        return $this;
	    }

	    public function getFoto()
	    {
	        return $this->foto;
	    }

	    public function setFoto($foto)
	    {
	        $this->foto = $foto;

	        return $this;
	    }

	    public function getEsAdmin()
	    {
	        return $this->es_admin;
	    }

	    public function setEsAdmin($es_admin)
	    {
	        $this->es_admin = $es_admin;
	        return $this;
        }


        public function iniciarSesion($email, $con){
            $query = "SELECT *  FROM usuario WHERE email_usu='$email' AND con_usu=MD5('$con');";
            $db = new Database();
			$db->query($query);			
			$usu = $db->getObject('Usuario');

			if($usu != false){
				return $usu;
			}else{
				return false;
			}
        }
    }