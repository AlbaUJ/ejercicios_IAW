<?php
$mensaje = 'La accion se ha ejecturado correctamente. En realidad no se que ha sido';
if (isset($_GET['ok'])) {
     $ok = $_GET['ok'];
    $mensajes = [
        'destroy'   => 'Se ha borrado correctado',
        'store'     => 'Se ha insertado correctamente. ',
        'update'    => 'Se ha editado correctamente el alumno',
    ];
    if(isset($mensajes[$ok])) {
        $mensaje = $mensajes[$ok];
    }
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?= $mensaje ?>
    <a href="indexMercadona.php">Volver al listado </a>
    </h1>
</body>
</html>