<?php


//seeder: para poblar las tablas de mi aplicacion
//  para disponer de los datos iniciales

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
    $nombre = 'Juan';
    $apellido = 'Heredia Ferrer';
    $fecha_nacimiento = '2000-01-01';
    $correo = 'juhefe@ieszaidinvergeles.org';
    $nota_corte = 8.55;


    $sql = "insert into alumnos 
                (nombre, apellido, fecha_nacimiento, correo, nota_corte)
                values (:nombre,
                        :apellido, 
                        :fecha_nacimiento, 
                        :correo, 
                        :nota_corte);"; //esto es para que sea imposible hacer la inyeccion
           

        $sentencia_preparada = $pdo->prepare($sql);  //darle los valores de las variables
        $datos = [
            'nombre'            => $nombre,
            'apellido'          => $apellido,
            'fecha_nacimiento'  => $fecha_nacimiento,
            'correo'            => $correo,
            'nota_corte'        => $nota_corte
        ];

       // $pdo->exec($sql); no hace falta porque ya tenemos hecha la sentencia
       $sentencia_preparada->execute($datos);

        echo('insert  ok<br>');
} catch (Throwable $error){
 echo ('se ha producido un error, aqui mas informacion:');
    echo ($error->getMessage());
}