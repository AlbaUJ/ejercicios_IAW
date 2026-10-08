<?php
$alumnos = [
   [' Atienza Bermúdez, Alejandro', 'm', 18],
   [' Calderer Sánchez, Lucas', 'm', 21],
   [' Cano Merino, Carlos', 'm', 20],
   [' Chari, Abdelali', 'm', 19],
   [' García Zarco, Francisco José', 'm', 18],
   [' Gómez Pérez, Samuel', 'm', 21],
   [' Iáñez Navarro, Daniel', 'm', 19],
   [' López Lasheras, Alan', 'm', 20],
   [' Maldonado Cabezas, Francisco', 'm', 18],
   [' Martín Arias, Carlos', 'm', 21],
   [' Moreno González, Alexandra', 'f', 19],
   [' Muñoz Moreno, Elisabet', 'f', 20],
   [' Ourhzif, Aymane', 'm', 18],
   [' Sánchez Ortiz, Emilio David', 'm', 19],
   [' Sánchez Rodríguez, Beatriz', 'f', 21],
   [' Torres Gómez, Ignacio', 'm', 20],
   [' Uréndez Jiménez, Alba', 'f', 18],
   [' Uribe Aranda, Francisco', 'm', 19],
   [' Velasco Clavero, Pablo', 'm', 21]
];
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
                    <td>Alumno</td>
                    <td>Género</td>
                    <td>Edad</td>
                </tr>
                <?php 
                $genero = null;
                    foreach($alumnos as $indice => $alumnoGenero){ 
                        if ($alumnoGenero[2] % 2 ==0){
                            $color = "blue"; //par
                        } else{
                            $color = "green"; //impar
                        }
                ?>
                    <tr style= "color:<?= $color ?>;">
                        <td><?= $indice ?></td>
                        <td><?= $alumnoGenero[0] ?></td> <!--posicion 0 es el nombre del alumno y la 1 el genero-->
                        <td><?= $alumnoGenero[1] ?></td>
                        <td><?= $alumnoGenero[2] ?> </td>
                    </tr>
                <?php
                    }
                ?>
            </table>


    </body>
</html>
<?php

# 2º agregar a la informacion de cada alumno su edad, crear una tercera columna con la edad del alumno 
#(si la edad del alumno es par azul y si es impar en verde) cada uno en un archivo separado




