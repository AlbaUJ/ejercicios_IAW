<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1>Alta de alumnos</h1>
    <form action="store.php" method="post"> <!-- post: crear y editar-->
        <label for="nombre">Nombre</label>
        <input type="text"
                name="nombre"
                id="nombre"
                value= ""
                placeholder="Introduce el nombre del alumno. Ej:Francisco"
                required
                minlength="2"
                maxlength="100" > <!--la que pusimos en la migracion en el try-->

        <br>
        <label for="apellido">Apellido</label>
        <input type="text"
                name="apellido"
                id="apellido"
                value= ""
                placeholder="Introduce los apellidos del alumno. Ej:Pérez López"
                required
                minlength="2"
                maxlength="100" >   
        <br>
        <label for="fecha_nacimiento">Fecha nacimiento</label>     
        <input type="date"
                name="fecha_nacimiento"
                id="fecha_nacimiento"
                value=""
                required >
        <br>
        <label for="correo">Correo</label>
        <input type="email"
                name="correo"
                id="correo"
                value=""
                maxlength="150"
                placeholder="introduce el correo del alumno. Ej: alumno@correo.es">
        <br>
        <label for="nota_corte">Nota corte</label>
        <input type="number" 
                name="nota_corte" 
                id="nota_corte"
                value=""
                placeholder="Introduce la nota de corte del alumno. Ej:7.89"
                min="0.00"
                max="10.00"
                step="0.01">
        <br>
        <button type="submit">Alta alumnos</button>

    </form>
</body>
</html>