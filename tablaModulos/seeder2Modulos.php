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

$modulos = [
    ['Administración de Sistemas Gestores de Bases de Datos', 'ASGBD', 5.00, 3],
    ['Seguridad y Alta Disponibilidad',                       'SAD',   6.00, 3],
    ['Itinerario Personal para la Empleabilidad II',          'IPE2',  5.00, 3],
    ['Inglés Profesional',                                    'ING',   3.00, 2],
    ['Proyecto Intermodular de ASIR',                         'PASIR', 4.00, 2],
    ['Optativa ASIR',                                         'OPT',   4.00, 3],
];

//sentencia preparada -> evitar inyecciones SQL
$sql = "insert into modulos 
                (nombre, abreviatura, creditos, horassemanales)
                values (:nombre,
                        :abreviatura, 
                        :creditos, 
                        :horassemanales);"; //esto es para que sea imposible hacer la inyeccion

$sentencia_preparada = $pdo->prepare($sql);

foreach ($modulos as $m) {
    $datos = [
        'nombre'         => $m[0],
        'abreviatura'    => $m[1],
        'creditos'       => $m[2],
        'horassemanales' => $m[3]
    ];
    $sentencia_preparada->execute($datos);
    echo('insert ' . $m[1] . ' ok<br>');
}
echo('Todo insertado');

} catch (Throwable $errorModulos){
echo ('se ha producido un error, aqui mas informacion:');
echo ($errorModulos->getMessage());
}