<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1> Alta mercadona
        <a href="indexMercadona.php">Volver al listado</a> <br>
    </h1>
    <form action="storeMercadona.php" method="post"> 
        <label for="direccion">Direccion</label>
        <input type="text"
                name="direccion"
                id="direccion"
                value= ""
                placeholder="Introduce la direccion"
                required
                maxlength="150" > 

        <br>
        <label for="localidad">Localidad</label>
        <input type="text"
                name="localidad"
                id="localidad"
                value= ""
                placeholder="Introduce la localidad"
                required
                maxlength="100" >   
        <br>
        <label for="fecha_apertura">Fecha apertura</label>     
        <input type="date"
                name="fecha_apertura"
                id="fecha_apertura"
                value=""
                required >
        <br>
        <label for="encargado">Encargado</label>
        <input type="text"
                name="encargado"
                id="encargado"
                value=""
                maxlength="150"
                required
                placeholder="introduce el nombre del encargado">

        <br>
        <label for="telefono"> Telefono</label>
        <input type="text" 
                name="telefono" 
                id="telefono"
                value=""
                placeholder="Introduce el telefono"
                maxlength="12">
        <br>
        <label for="ingreso_anual"> Ingreso anual</label>
        <input type="number" 
                name="ingreso_anual" 
                id="ingreso_anual"
                value=""
                placeholder="Introduce el ingreso anual"
                step="0.001"
                min="0"
                max="9999999.999">
                
        <br>
        <button type="submit">Alta Mercadonas</button>

    </form>
</body>
</html>