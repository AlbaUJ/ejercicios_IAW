<?php

//esta pagina recibe datos de un módulo nuevo, 
//los lee y los utiliza para insertarlos en la 
//tabla de la base de datos

// a esta pagina se llega con POST

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

if(!isset($_POST['nombre']) ||  // || significa o
    !isset($_POST['abreviatura']) ||
    !isset($_POST['creditos']) ||
    !isset($_POST['horassemanales'])){

header('Location: errorModulos.php'); //si no se cumple, que mande al error
exit;//para que finalice
}

//sentencia preparada -> evitar inyecciones SQL

$nombre = $_POST["nombre"];
$abreviatura = $_POST["abreviatura"];
$creditos = $_POST["creditos"];
$horassemanales = $_POST["horassemanales"];

if ($horassemanales == ''){
$horassemanales = null;
}

$sql = "insert into modulos 
                (nombre, abreviatura, creditos, horassemanales)
                values (:nombre,
                        :abreviatura, 
                        :creditos, 
                        :horassemanales);"; //esto es para que sea imposible hacer la inyeccion

$sentencia_preparada = $pdo->prepare($sql);  //darle los valores de las variables
$datos = [
'nombre'          => $nombre,
'abreviatura'     => $abreviatura,
'creditos'        => $creditos,
'horassemanales'  => $horassemanales
        ];

$sentencia_preparada->execute($datos);

// redireccion a EXITO
header('Location: exitoModulos.php');

} catch (\Throwable $error){
//redireccion a ERROR
header('Location: errorModulos.php');
}