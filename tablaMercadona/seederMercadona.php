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


try{
    $pdo = new PDO ($dsn, $user, $password, $options);
     $sql1 = "insert into mercadona 
                values (null, 
                        'Calle Larios 10',
                        'Málaga', 
                        '2000-10-20', 
                        'Pepe Jiménez López', 
                        '952123456',
                        1500000.250 );";
    $sql2 = "insert into mercadona 
            (direccion, localidad, fecha_apertura, encargado, telefono, ingreso_anual)
            values('Avenida de Andalucía 25',
                    'Málaga',
                    '2007-09-12',
                    'María Sánchez Molina',
                    '952654321',
                    2300000.500)";
    $sql3 = "insert into mercadona 
            (direccion, localidad, fecha_apertura, encargado, telefono, ingreso_anual)
            values('Calle Real 5',
                    'Marbella',
                    '2015-01-02',
                    'Rogelia Gómez Gómez',
                    NULL,
                    980000.100)";  
    $sql4 = "insert into mercadona 
            (direccion, localidad, fecha_apertura, encargado, telefono, ingreso_anual)
            values('Paseo Marítimo 3',
                    'Fuengirola',
                    '2018-03-05',
                    'Alfonso Rodriguez Perez',
                    '952987654',
                    1750000.750)";               
        $pdo->exec($sql1);
        echo('insert 1 ok<br>');
        $pdo->exec($sql2);
        echo('insert 2 ok <br>');
        $pdo->exec($sql3);
        echo('insert 3 ok <br>');
// $pdo->exec($sql1 . $sql2 . $sql3);
        echo ('Todo insertado');

} catch (Throwable $error){ 
 echo ('se ha producido un error, aqui mas informacion:');
    echo ($error->getMessage());
}