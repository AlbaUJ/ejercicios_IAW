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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1>Edición de mercadona
        <a href="indexMercadona.php">Volver al listado</a> <br>
    </h1>
    <form action="updateMercadona.php" method="post"> <!-- post: crear y editar-->
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="direccion">Direccion:</label>
        <input type="text"
                name="direccion"
                id="direccion"
                value= "<?= $fila['direccion']?>"
                placeholder="Introduce la direccion del mercadona"
                required
                maxlength="150" > 

        <br>
        <label for="localidad">Localidad</label>
        <input type="text"
                name="localidad"
                id="localidad"
                value= "<?= $fila['localidad']?>"
                placeholder="Introduce la localidad"
                required
                maxlength="100" >   
        <br>
        <label for="fecha_apertura">Fecha apertura</label>     
        <input type="date"
                name="fecha_apertura"
                id="fecha_apertura"
                value="<?= $fila['fecha_apertura']?>"
                required >
        <br>
        <label for="encargado">encargado</label>
        <input type="text"
                name="encargado"
                id="encargado"
                value="<?= $fila['encargado']?>"
                maxlength="150"
                required
                placeholder="introduce el nombre del encargado">
        <br>
        <label for="telefono">telefono</label>
        <input type="text" 
                name="telefono" 
                id="telefono"
                value="<?= $fila['telefono']?>"
                placeholder="Introduce el telefono"
                maxlength="12">
        <br>
        <label for="ingreso_anual">Ingreso anual</label>
        <input type="number" 
                name="ingreso_anual" 
                id="ingreso_anual"
                value="<?= $fila['ingreso_anual']?>"
                placeholder="Introduce el ingreso anual"
                step="0.001"
                min="0"
                max="9999999.999">
        <br>
        <button type="submit">Editar alumnos</button>

    </form>
</body>
</html>