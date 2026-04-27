<?php 

    const NOMBRE = "Christopher"; //Declarando constantes en PHP, el valor de una constante no puede ser cambiado
    const APELLIDO = "Sanchez";

    $nombreCompleto = NOMBRE." ".APELLIDO;//Concatenacion de cadenas

    $edad = 19; //Variable de tipo entero, almacena numeros enteros sin decimales
    $educacion = "Instituto Tecnico Ricaldone";//Variable de tipo cadena, almacena texto

?>

<div>
        <div class="text-center">
                <h1>Bienvenido a PHP</h1> 
            </div>
            <h3 class="text-center">Hola, mi nombre es <?php echo $nombreCompleto; ?></h3>
            <h3 class="text-center">Y esta es mi primera pagina con PHP</h3>
            <div>
                <p class="text-center bold">Edad: <?php echo $edad; ?></p>
                <p class="text-center bold">Educacion: <?php echo $educacion; ?></p>
            </div>
    </div>