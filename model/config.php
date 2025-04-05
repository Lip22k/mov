<?php
    require_once __DIR__.'../vendor/autoload.php';
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    define("__HOST__", $_ENV['HOST']);
    define("__DB_NAME__", $_ENV['DB_NAME']); 
    define("__USER__", $_ENV['USER']); 
    define("__PASS__", $_ENV['PASS']); 

    try {
        $pdo = new PDO("mysql:host=".__HOST__.";dbname=".__DB_NAME__,__USER__,__PASS__);        
    } catch (PDOException $Exception) {
        echo "Conexão Falhada";
        $logger->alert("Falha na conexão com o banco de dados, credenciais incorretas");
    }
?>