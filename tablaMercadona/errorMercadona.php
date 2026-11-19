<?php
$mensaje = 'La accion NO se ha ejecturado correctamente. En realidad no se que ha sido';
if (isset($_GET['error'])) {
     $error = $_GET['error'];
    $mensajes = [
        'mercadona' => 'El mercadona no existe',
        'id'   => 'No ha llegado el id del mercadona',
        'destroy'     => 'No se ha podido borrar el mercadona. ',
        'datos' => 'Datos incompletos para dar de alta el mercadona',
        'store' => 'No se ha podido guardar el mercadona',
        'update' => 'No se ha podido editar el mercadona',
    ];
    if(isset($mensajes[$error])) {
        $mensaje = $mensajes[$error];
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
    <br>
    <a href="indexMercadona.php">Volver al listado </a>    
</body>
</html>