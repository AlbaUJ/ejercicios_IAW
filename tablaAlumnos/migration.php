<?php
/*CREATE USER 'alba'@'%' IDENTIFIED WITH sha256_password BY 'ubuntu12345.';
GRANT USAGE ON *.* TO 'alba'@'%';
ALTER USER 'alba'@'%' REQUIRE NONE 
    WITH MAX_QUERIES_PER_HOUR 0 
        MAX_CONNECTIONS_PER_HOUR 0 
        MAX_UPDATES_PER_HOUR 0 
        MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `siga`.* TO 'alba'@'%';

CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    correo VARCHAR(150),
    nota_corte DECIMAL(4,2),
    CONSTRAINT uq_nombre_apellido UNIQUE (nombre, apellido)
);

*/

/*Variables de conexion*/ 
$host     = 'mysql'; // tenemos host porque usamos docker, normalmente se usa localhost
$db       = 'siga';
$user     = 'alba';
$password = 'ubuntu12345.';
$charset  = 'utf8mb4';

//cadena de conexion
// Definición del Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

/* Si la ejecucion dentro del bloque try falla,
se llama al bloque del catch y se le pasa la 
informacion del error (php)*/

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo('La conexión ha funcionado: <br>');

    $sql = "CREATE TABLE IF NOT EXISTS alumnos (
        id INT AUTO_INCREMENT PRIMARY KEY, /* autoincrement: que va incrementando de uno en uno, */
        nombre VARCHAR(100) NOT NULL,
        apellido VARCHAR(100) NOT NULL,
        fecha_nacimiento DATE NOT NULL,
        correo VARCHAR(150),
        nota_corte DECIMAL(4,2),
        CONSTRAINT uq_nombre_apellido UNIQUE (nombre, apellido)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    //aquí escribimos una sentencia de sql normal 


    // 3. Ejecutar la sentencia en el servidor
    //$pdo = conectamos con la base de datos y ejecutamos la sentencia sql. 
    // Si funciona correctamente nos saltará el mensaje de que todo está correcto, sino nos vamos al catch y hacemos lo que tengamos dentro.

    $pdo->exec($sql);
    echo "La tabla 'alumnos' se ha creado correctamente.";

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí mas informacion:');
    //echo ('<pre>' . var_export($error, true) . '</pre>');
    echo($error->getMessage());
}



?>