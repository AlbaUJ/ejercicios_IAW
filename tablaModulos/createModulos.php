<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1>Alta de módulos</h1>
    <form action="storeModulos.php" method="post"> <!-- post: crear y editar-->
        <label for="nombre">Nombre</label>
        <input type="text"
                name="nombre"
                id="nombre"
                value= ""
                placeholder="Introduce el nombre del modulo. Ej:Implantación de aplicaciones web"
                required
                minlength="2"
                maxlength="100" > <!--la que pusimos en la migracion en el try-->

        <br>
        <label for="abreviatura">Abreviatura</label>
        <input type="text"
                name="abreviatura"
                id="abreviatura"
                value= ""
                placeholder="Introduce la abreviatura. Ej: IAW"
                required
                minlength="2"
                maxlength="5" >  
        <br>
        <label for="creditos">Créditos</label>
        <input type="number"
               name="creditos"
               id="creditos"
               value=""
               placeholder="Introduce los créditos. Ej: 6.00"
               min="0.00"
               max="99.99"
               step="0.01"
               required >
        <br>
        <label for="horassemanales">Horas semanales</label>
        <input type="number"
                name="horassemanales"
                id="horassemanales"
                value=""
                placeholder="Introduce las horas semanales. Ej: 4"
                min="1"
                max="30"
                step="1">
        <br>
        <br>
        <button type="submit">Alta módulos</button>

    </form>
</body>
</html>