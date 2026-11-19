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


    if(!isset($_POST['direccion']) || 
            !isset($_POST['localidad']) ||
            !isset($_POST['fecha_apertura']) ||
            !isset($_POST['encargado']) ||
            !isset($_POST['telefono']) ||
            !isset($_POST['ingreso_anual'])) {
        header('Location: errorMercadona.php?error=datos'); //si no se cumple, que mande al error
        exit;//para que finalice
    }

    //sentencia preparada -> evitar inyecciones SQL

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


    $sql = "insert into mercadona 
                (direccion, localidad, fecha_apertura, encargado, telefono, ingreso_anual)
                values (:direccion,
                        :localidad, 
                        :fecha_apertura, 
                        :encargado, 
                        :telefono,
                        :ingreso_anual);"; //esto es para que sea imposible hacer la inyeccion
           

        $sentencia_preparada = $pdo->prepare($sql);  //darle los valores de las variables
        $datos = [
            'direccion'         => $direccion,
            'localidad'         => $localidad,
            'fecha_apertura'    => $fecha_apertura,
            'encargado'         => $encargado,
            'telefono'          => $telefono,
            'ingreso_anual'     => $ingreso_anual
        ];

       // $pdo->exec($sql); no hace falta porque ya tenemos hecha la sentencia
       $sentencia_preparada->execute($datos);

        // redireccion a EXITO
       // echo(' insert  ok<br>');
    header('Location: exitoMercadona.php?ok=store');

} catch (\Throwable $error){
    // echo ('Se ha producido un error, aqui mas informacion:');
    //echo ($error->getMessage());
    //redireccion a ERROR
    header('Location: errorMercadona.php?error=store');
}