<?php 

foreach($alertas as $key => $tipo) { 
    foreach($tipo as $mensaje) { ?>

        <div class="alerta alerta__<?php echo $key; ?>"><?php echo $mensaje;?></div>

<?php
    } 
} 
?>