<?php 
    $familiares = [
        "Cecilia (Madre)", 
        "Gustavo (Padre)", 
        "Daniel (hermano)", 
        "David (Mejor Amigo)",
        "Edgar (Amigo)",
        "Andrea (Amiga)"
    ]; //Array de datos en PHP, se pueden usar para almacenar listas de datos
?> 


<h4 class = "text-center">Aca una lista de las personas mas importantes para mi</h4>
        <div class = "row row-cols-1 row-cols-md-2 g-4">
            <?php foreach($familiares as $familiar): ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><?php echo $familiar; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>