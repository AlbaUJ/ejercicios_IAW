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
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try{
    $pdo = new PDO ($dsn, $user, $password, $options);
    $sql1 = "insert into alumnos 
                values (null, 
                        'Pepe',
                        'Jiménez López', 
                        '2000-10-20', 
                        'pepe@ieszaidinvergeles.org', 
                        8.5 );";
    $sql2 = "insert into alumnos 
            (nombre, apellido, fecha_nacimiento, correo, nota_corte)
            values('María',
                    'Sánchez Molina',
                    '2007-09-12',
                    'maria@ieszaidinvergeles.org',
                    7.8)";
    $sql3 = "insert into alumnos 
            (nombre, apellido, fecha_nacimiento, correo, nota_corte)
            values('Rogelia',
                    'Gómez Gómez',
                    '1969-01-02',
                    'rogeliaTuRubita@ieszaidinvergeles.org',
                    0.1)";  
    $sql4 = "insert into alumnos 
            (nombre, apellido, fecha_nacimiento, correo, nota_corte)
            values('Alfonso',
                    'Rodriguez Perez',
                    '1990-03-05',
                    'alfonsorope@ieszaidinvergeles.org',
                    6.7)";              
        $pdo->exec($sql1);
        echo('insert 1 ok<br>');
        $pdo->exec($sql2);
        echo('insert 2 ok <br>');
        $pdo->exec($sql3);
        echo('insert 3 ok <br>');
// $pdo->exec($sql1 . $sql2 . $sql3);
        echo ('Todo insertado');

} catch (Throwable $error){ //catch seria el else
 echo ('se ha producido un error, aqui mas informacion:');
    echo ($error->getMessage());
}