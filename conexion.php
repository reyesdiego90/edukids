
<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct(){
        $this->host = '127.0.0.1';
        $this->db = 'edukids';
        $this->user = 'root';
         $this->password = 'Carlosortega1';
       // $this->host = 'edukids.edu.gt';
       // $this->db = 'edukids_edukidsDatos';
       // $this->user = 'edukids_reyesdiego90';
       // $this->password = 'KCKBd7!G!z0n';
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            echo "Conexión con la base de datos conseguida.";
            return $pdo;
            
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
        
    }
    

}

?>