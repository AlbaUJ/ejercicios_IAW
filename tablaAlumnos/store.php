<?php

//esta pagina recibe datos de un alumno nuevo, 
//los lee y los utiliza para insertarlos en la 
//tabla de la base de datos


// a esta pagina se llega con POST


//pretty vardump
/*echo ('<pre>' . var_export($_POST, true) . '</pre>'); //vardump archivo 3


echo("eres " . $_POST["nombre"] .
      " tus apellidos son " . $_POST["apellido"] .
      " tu fecha de nacimiento es: " . $_POST["fecha_nacimiento"] . 
      " tu correo es " . $_POST["correo"] . 
      " tu nota de corte es " .  $_POST["nota_corte"] ); //echo para ver cada uno de los datos que me han llegado
*/
//para añadirlo a la base de datos


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
    !isset($_POST['apellido']) ||
    !isset($_POST['fecha_nacimiento']) ||
    !isset($_POST[correo]) ||
    !isset($_POST['nota_corte'])){

    header('Location: error.php'); //si no se cumple, que mande al error
exit;//para que finalice
}

    //sentencia preparada -> evitar inyecciones SQL

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $correo = $_POST["correo"];
    $nota_corte =$_POST["nota_corte"];

if (correo == ''){
    $correo = null;
}
if (nota_corte == ''){
    $nota_corte = null;
}


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

        // redireccion a EXITO
       // echo(' insert  ok<br>');
header('Location: exito.php');

} catch (\Throwable $error){
// echo ('Se ha producido un error, aqui mas informacion:');
  //  echo ($error->getMessage());
  //redireccion a ERROR
header('Location: error.php');

}