<?php
$host     = 'mysql'; 
$db       = 'siga';
$user     = 'alba';
$password = 'ubuntu12345.';
$charset  = 'utf8mb4';

//cadena de conexion
// Definición del Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try {
    $pdo = new PDO($dsn, $user, $password, $options);
    $sql = "select * from mercadona";
    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute();

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí mas informacion:');
    echo($error->getMessage());
    exit;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de mercadonas</title>
</head>
<body>
    <h1>Lista de mercadonas</h1>
    <h2>
        <a href="createMercadona.php">Crear mercadona </a>    
    </h2>
    <table border=1> <!--poner los datos en una tabla-->
            <tr>
                <td>#</td>
                <td>Mercadona</td>
                <td>Operación</td>
            </tr>
            <?php
                while($fila = $sentencia_preparada->fetch()){
            ?>
            <tr>
                <td><?= $fila['id']?></td>
                <td><?= $fila['direccion'] . ' ' . $fila['localidad']?></td> 
                <td>
                    <a href="showMercadona.php?id=<?= $fila['id']?>">Ver</a> 
                    <a href="editMercadona.php?id=<?= $fila['id']?>">Editar</a>
                    <a href="deleteMercadona.php?id=<?= $fila['id']?>">Borrar</a>
                    </td>
            </tr>
            <?php

                }
            ?>
        </table>

</body>
</html>