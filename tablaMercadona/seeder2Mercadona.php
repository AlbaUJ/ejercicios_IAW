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


try{
    $pdo = new PDO ($dsn, $user, $password, $options);
    //sentencia preparada -> evitar inyecciones SQL
    $direccion = 'Calle Granada 12';
    $localidad = 'Torremolinos';
    $fecha_apertura = '2020-01-01';
    $encargado = 'Juan Heredia Ferrer';
    $telefono = '952111222';
    $ingreso_anual = 1200000.550;


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

        echo('insert  ok<br>');
} catch (Throwable $error){
 echo ('se ha producido un error, aqui mas informacion:');
    echo ($error->getMessage());
}