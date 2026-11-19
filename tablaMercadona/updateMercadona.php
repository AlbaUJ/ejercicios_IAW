<?php


$host   = 'mysql';
$db   = 'siga';
$user   = 'alba';
$password   = 'ubuntu12345.';
$charset   = 'utf8mb4';



$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    PDO::ATTR_EMULATE_PREPARES   => false, 
];



try {
    $pdo = new PDO ($dsn, $user, $password, $options);

    //comprobar que llegan los datos 
    if(!isset($_POST['id']) || 
            !isset($_POST['direccion']) || 
            !isset($_POST['localidad']) ||
            !isset($_POST['fecha_apertura']) ||
            !isset($_POST['encargado']) ||
            !isset($_POST['telefono']) ||
            !isset($_POST['ingreso_anual'])) {
        header('Location: error.php?error=datos'); //si no se cumple, que mande al error
        exit;
    }

    //sentencia preparada -> evitar inyecciones SQL

    $id = $_POST["id"];
    $direccion = $_POST["direccion"];
    $localidad = $_POST["localidad"];
    $fecha_apertura = $_POST["fecha_apertura"];
    $encargado = $_POST["encargado"];
    $telefono = $_POST["telefono"];
    $ingreso_anual = $_POST["ingreso_anual"];

    if ($telefono == ''){
        $telefono = null;
    }
    if ($ingreso_anual == ''){
        $ingreso_anual = 0;
    }

    $sql = "update mercadona set 
            direccion = :direccion, 
            localidad = :localidad,
            fecha_apertura = :fecha_apertura,
            encargado = :encargado,
            telefono = :telefono,
            ingreso_anual = :ingreso_anual 
            where id = :id";

    $sentencia_preparada = $pdo->prepare($sql);  //darle los valores de las variables
    $datos = [
        'id'                => $id,
        'direccion'         => $direccion,
        'localidad'         => $localidad,
        'fecha_apertura'    => $fecha_apertura,
        'encargado'         => $encargado,
        'telefono'          => $telefono,
        'ingreso_anual'     => $ingreso_anual
    ];

    $sentencia_preparada->execute($datos);
    header('Location: exitoMercadona.php?ok=update');

} catch (\Throwable $error){
    // echo ('Se ha producido un error, aqui mas informacion:');
    //echo ($error->getMessage());
    //redireccion a ERROR
    header('Location: errorMercadona.php?error=update');
}