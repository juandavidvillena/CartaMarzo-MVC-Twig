<?php
	class Database 	{

		private $host = "localhost" ;

		private $dbName = 'plantillamenu';
		private $dbUser = 'root';
		private $dbPass = '';

		private $pdo ;
		private $res ;

		/**
		 * realiza la conexión con el motor de bases de datos
		 */
		public function __construct()
		{
			$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName","$this->dbUser","$this->dbPass")
						 or die("Error de conexión con la base de datos.") ;
		}

		/**
		 * cierra la conexión con la base de datos antes de que
		 * se destruya el objeto Database.
		 */
		public function __destruct()
		{
			$this->pdo = null ;
		}

		/**
		 * realiza una consulta en la base de datos
		 */
		public function query($sql)
		{
			$this->res = $this->pdo->query($sql) ;
		}

		/**
		 * devuelve un registro en formato de objeto
		 */
		public function getObject($cls = "StdClass")
		{
			return $this->res->fetchObject($cls) ;
		}

		/**
		 * devuelve el último ID
		 */
		public function lastId()
		{
			return $this->pdo->lastInsertId() ;
		}

	}