<?php

$host   = 'mysql';
$db   = 'siga';
$user   = 'alba';
$password   = 'ubuntu12345.';
$charset   = 'utf8mb4';



$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //sentencias asociativas
    PDO::ATTR_EMULATE_PREPARES   => false, //sentencias preparadas
];



try {
    $pdo = new PDO ($dsn, $user, $password, $options);
    if(!isset($_POST['id'])) {
        header('Location: errorMercadona.php?error=id'); 
        exit;
    }


    $id = $_POST["id"];
    $sql = "delete from mercadona where id = :id";
    $sentencia_preparada = $pdo->prepare($sql);  
        $datos = [
            'id'  => $id,
        ];
       $sentencia_preparada->execute($datos);
        header('Location: exitoMercadona.php?ok=destroy');
} catch (Exception $error){
        header('Location: errorMercadona.php?error=destroy');
}