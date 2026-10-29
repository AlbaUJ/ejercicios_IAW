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
$sql1 = "insert into modulos 
                values (null, 
                        'Administración de Sistemas Operativos',
                        'ASO', 
                        12.00, 
                        5 );";
$sql2 = "insert into modulos 
            (nombre, abreviatura, creditos, horassemanales)
            values('Servicios de Red e Internet',
                    'SRI',
                    13.00,
                    5)";
$sql3 = "insert into modulos 
            (nombre, abreviatura, creditos, horassemanales)
            values('Implantación de Aplicaciones Web',
                    'IAW',
                    9.00,
                    4)";
$pdo->exec($sql1);
echo('insert 1 ok<br>');
$pdo->exec($sql2);
echo('insert 2 ok <br>');
$pdo->exec($sql3);
echo('insert 3 ok <br>');
echo ('Todo insertado');

} catch (Throwable $errorModulos){
echo ('se ha producido un error, aqui mas informacion:');
echo ($errorModulos->getMessage());
}