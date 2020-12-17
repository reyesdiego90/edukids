<?php

class Database{
  private $server; 
  private $user ;
  private $pass;
  private $db ;
  
  public function __construct(){
    $this->server = '127.0.0.1'; 
    $this->db = 'Edukids'; 
    $this->user = 'root'; 
    $this->pass  = 'toor'; 
  }


  function connect(){
    try{
      $connection = "mysql:host=" . $this->server . ";dbname=" . $this->db;
      $option = [
        PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];

      $pdo = new PDO($connection, $this->user, $this->pass, $option);
      echo 'conectado';
      return $pdo;
    }catch(PDOException $e){
      print_r('Error connection: '. $e->getMessage());
    }
  }

}

?>