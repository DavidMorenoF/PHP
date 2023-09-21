<style>
.error {color: #FF0000;}
</style>



<?php

$matriz_long = $matriz_height = 0 ;
$matriz_long_err = $matriz_height_err = "";
$err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["filas"])) {
      $matriz_height_err = "Fila tiene que tener valor";
    } else {
      $matriz_height = test_input($_POST["filas"]);
    }
    if (empty($_POST["columnas"])) {
        $matriz_long_err = "Fila tiene que tener valor";
      } else {
        $matriz_long = test_input($_POST["columnas"]);
      }
    
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<h2>Tablero Ajedrez</h2>
<p><span class="error">* Campo obligatorio.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Numero de Filas: <input type="number" name="filas"/>
    <span class="error">* <?php echo $matriz_height_err;?></span>
    <br><br>
    Numero de Columnas: <input type="number" name="columnas"/>
    <span class="error">* <?php echo $matriz_long_err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Crear">
    <input type="submit" name="jugar" value="Jugar">
</form>

<?php
if ($matriz_height != $matriz_long){
    echo "El tablero debe tener el mismo numero de filas y columnas.";
}
else{
    if ($matriz_height != 0 && $matriz_long != 0){
        $matriz = array();
        $posicio_fila=1;
        for ($fila_it = 0; $fila_it <= $matriz_height; $fila_it++){
            $fila = array();
            if ($posicio_fila == $matriz_height + 1){
                $posicio_columna=1;
                $abecedario = array();
                $miletra = 'A';
                for ($i =0; $i < 30; $i++){
                    array_push($abecedario, $miletra);
                    $miletra++;
                }
                for($columna_it = 0; $columna_it <= $matriz_long ; $columna_it++){
                    if ($columna_it < $matriz_long){
                        array_push($fila, $abecedario[$columna_it]);
                    }
                    else{
                        array_push($fila, '');
                    }
                    $posicio_columna++;
                }
                array_push($matriz, $fila);
            }
            elseif ($posicio_fila % 2 != 0){
                $posicio_columna=1;
                for($columna_it = 0; $columna_it <= $matriz_long; $columna_it++){
                    if ($posicio_columna % 2 == 0){
                        array_push($fila, 'X');
                    }
                    elseif($posicio_columna == $matriz_long + 1){
                        array_push($fila, strval($posicio_fila));
                    }
                    else{
                        array_push($fila, 'O');
                    }
                    $posicio_columna++;
                }
                array_push($matriz, $fila);
            }
            else{
                $posicio_columna=1;
                for($columna_it = 0; $columna_it <= $matriz_long; $columna_it++){
                    if($posicio_columna == $matriz_long + 1){
                        array_push($fila, strval($posicio_fila));
                    }
                    elseif ($posicio_columna % 2 != 0){
                        array_push($fila, 'X');
                    }
                    else{
                        array_push($fila, 'O');
                    }
                    $posicio_columna++;
                }
                array_push($matriz, $fila);
            
            }
            $posicio_fila++;
        }
        foreach ($matriz as $fila){
            foreach($fila as $cuadrado){
                echo $cuadrado;
            }
            echo "<br>";
        }
    }
}
if (isset($_POST['jugar'])) {
    echo "<br>";
    echo "Vamos a Jugar.<br>";
    $fila_inicio_arriba= array('T','C','A','M','R','A','C','T','1');
    $fila_inicio_abajo= array('T','C','A','M','R','A','C','T','8');
    $matriz[0] = $fila_inicio_arriba;
    $matriz[7] = $fila_inicio_abajo;
    $matriz[1] = array('P','P','P','P','P','P','P','P','2');
    $matriz[6] = array('P','P','P','P','P','P','P','P','7');
    foreach ($matriz as $fila){
        foreach($fila as $cuadrado){
            echo $cuadrado . " ";
            
        }
        echo "<br>";
    }
}

?>


