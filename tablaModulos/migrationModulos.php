<?php
/*Variables de conexion*/ 
$host     = 'mysql'; // tenemos host porque usamos docker, normalmente se usa localhost
$db       = 'siga';
$user     = 'alba';
$password = 'ubuntu12345.';
$charset  = 'utf8mb4';

// Definición del Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
$pdo = new PDO($dsn, $user, $password, $options);
echo('La conexión ha funcionado: <br>');

$sql = "CREATE TABLE IF NOT EXISTS modulos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL unique,
        abreviatura VARCHAR(5) NOT NULL unique,
        creditos decimal(4, 2) NOT NULL,
        horassemanales smallint
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$pdo->exec($sql);
echo "La tabla 'modulos' se ha creado correctamente.";

} catch (\Throwable $errorModulos) {
echo ('Se ha producido un error, aquí mas informacion:');
echo($errorModulos->getMessage());
}
?>