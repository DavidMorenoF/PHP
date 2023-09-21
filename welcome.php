<form action="accion.php" method="post">
 <p>Su nombre: <input type="text" name="nombre" /></p>
 <p>Su edad: <input type="text" name="edad" /></p>
 <p>Su mail: <input type="text" name="mail" /></p>
 <p><input type="submit" /></p>
</form>

<?php
$hola_mundo = "Hola Mundo";
echo '<h1>' . $hola_mundo . "</h1>" . "\n";
if (is_string($hola_mundo))
{
    echo "Es un string";
}
echo "</br>";
for ($i=1; $i<=10; ++$i)
{
  echo $i . "</br>";
}
?>