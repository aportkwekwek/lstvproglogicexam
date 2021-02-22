<?php


    require_once (__DIR__ ."/vendor/autoload.php");

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    class Connection{
        private $server = "mysql:host=localhost;dbname=lstventuressqlexam";
        private $user = "root";
        private $pass = "";

        protected $conn;

        public function openConnection(){
            try{

                $host = $_ENV['DB_HOST'];
                $dbname = $_ENV['DB_NAME_LOG'];
                $dbuser =$_ENV['DB_USER'];
                $dbpass = "";

                $server = "mysql:host=$host;dbname=$dbname";
                
                $this->conn = new PDO($server,$dbuser,$dbpass);
                return $this->conn;
            }catch(PDOException $e){
                echo "Please check your connection " . $e->getMessage();
            }
        }

        public function closeConnection(){
            $this->conn = null;
        }

    }

?>