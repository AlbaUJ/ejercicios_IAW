<?php
$alumnos = [
   [' Atienza Bermúdez, Alejandro', 'm'],
   [' Calderer Sánchez, Lucas', 'm'],
   [' Cano Merino, Carlos', 'm'],
   [' Chari, Abdelali', 'm'],
   [' García Zarco, Francisco José', 'm'],
   [' Gómez Pérez, Samuel', 'm'],
   [' Iáñez Navarro, Daniel', 'm'],
   [' López Lasheras, Alan', 'm'],
   [' Maldonado Cabezas, Francisco', 'm'],
   [' Martín Arias, Carlos', 'm'],
   [' Moreno González, Alexandra', 'f'],
   [' Muñoz Moreno, Elisabet', 'f'],
   [' Ourhzif, Aymane', 'm'],
   [' Sánchez Ortiz, Emilio David', 'm'],
   [' Sánchez Rodríguez, Beatriz', 'f'],
   [' Torres Gómez, Ignacio', 'm'],
   [' Uréndez Jiménez, Alba', 'f'],
   [' Uribe Aranda, Francisco', 'm'],
   [' Velasco Clavero, Pablo', 'm']
] ; 
$genero = [];
//$alumnos[] = 'primer alumno'; 
//$alumnos = [] ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Visualizando el array</h1>
        <table border=1> 
            <tr>
                <td>#</td>
                <td>alumno</td>
                <td>Género</td>
            </tr>
            <?php 
            $genero = null;
                foreach($alumnos as $indice => $alumnoGenero){ 
                    if ($alumnoGenero[1] == 'm'){
                        $color = "green";
                    } else{
                        $color = "blue";
                    }
            ?>
                <tr style= "color:<?= $color ?>;">
                    <td><?= $indice ?></td>
                    <td><?= $alumnoGenero[0] ?></td> <!--posicion 0 es el nombre del alumno y la 1 el genero-->
                    <td><?= $alumnoGenero[1] ?></td>
                </tr>
            <?php
                }
            ?>
        </table>


    </body>
</html>
<?php


# 1º si genero masculino, escribir fila en verde y si es femenino en azul



