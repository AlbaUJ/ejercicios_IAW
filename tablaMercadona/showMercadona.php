<?php

if(!isset($_GET['id'])) {
        header('Location: errorMercadona.php?error=id'); //si no se cumple, que mande al error
        exit;//para que finalice
    }

$id = $_GET['id'];

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
    $sql = "select * from mercadona where id = :id";
    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        'id' => $id
    ];
    $sentencia_preparada->execute($datos);

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí mas informacion:');
    echo($error->getMessage());
    exit;
}
$fila = $sentencia_preparada->fetch();
if($fila == null) { //si no hay fila significa que el id no es de nadie
    header('Location: errorMercadona.php?error=mercadona');
    exit;
}
//echo ('<pre>' . var_export($fila, true) . '</pre>');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de un mercadona</title>
</head>
<body>
    <h1>Datos de un mercadona</h1>
    <h2>
        <a href="indexMercadona.php">Volver </a>    
    </h2>
    <table border=1> <!--poner los datos en una tabla-->
            <tr>
                <td>#</td>
                <td>Direccion</td>
                <td>Localidad</td>
                <td>Fecha apertura</td>
                <td>Encargado</td>
                <td>Telefono</td>
                <td>Ingreso anual</td>
                <td>Operación</td> 
            </tr>
            <tr>
                <td><?= $fila['id']?></td>
                <td><?= $fila['direccion']?></td>
                <td><?= $fila['localidad']?></td>
                <td><?= $fila['fecha_apertura']?></td>
                <td><?= $fila['encargado']?></td>
                <td><?= $fila['telefono']?></td>
                <td><?= $fila['ingreso_anual']?></td>
                <td>
                    <a href="showMercadona.php?id=<?= $fila['id']?>">Ver</a> 
                    <a href="editMercadona.php?id=<?= $fila['id']?>">Editar</a> 
                    <a href="deleteMercadona.php?id=<?= $fila['id']?>">Borrar</a>
                    
                </td>
            </tr>

        </table>

</body>
</html>