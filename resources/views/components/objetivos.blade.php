<?php 
$objetivos = [
        "Terminar de aprender PHP al 100%",
        "Terminar de aprender REACT NATIVE para mi proyecto",
        "Terminar el proyecto PTC y sacar primer lugar",
        "Satisfacer al cliente con el proyecto y ayudarlo a impulsarse",
        "Conseguir Trabajo en una empresa",
        "Graduarme de Bachiller"
    ]; //Array de datos en PHP, se pueden usar para almacenar listas de datos
?>


<h3 class="text-center">Aca una lista de mis objetivos para 2026</h3>
    <ul class="list-group list-group-numbered">
        <?php foreach($objetivos as $objetivo): ?>
            <li class="list-group-item "><?php echo $objetivo; ?></li>
        <?php endforeach; ?>
    </ul>