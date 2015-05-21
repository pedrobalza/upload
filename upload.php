<?php 
function subirFichero($origen, $destinoDir, $ftemporal) {    
    $origen = strtolower(basename($origen));

    $destinoFull = $destinoDir.$origen;
    $frand = $origen;
    $i = 1;
    
    while (file_exists( $destinoFull )) {
        $file_name         = substr($origen, 0, strlen($origen)-4);
        $file_extension  = substr($origen, strlen($origen)-4, strlen($origen));
        $frand = $file_name."[$i]".$file_extension;
        $destinoFull = $destinoDir.$frand;
        $i++;
    }
    
    if (move_uploaded_file($ftemporal, $destinoFull))    return true;
    else                                                 return false;
}

if (!subirFichero($_FILES["file"]["name"], "/home/amphpziw/camarita/fotos/", $_FILES["file"]["tmp_name"])) {
    echo "aimsori";
print_r(error_get_last())
}
else echo "berygud";

?>