Hola <?php echo htmlspecialchars($_POST['nombre']); ?>.
<?php
if ((int)$_POST['edad'] >= 18){
    echo "Usted tiene " . htmlspecialchars($_POST['edad']) . " años. Por tanto, es mayor de edad.</br>";
}
else {
    echo "Usted tiene " . htmlspecialchars($_POST['edad']) . " años. Por tanto, es menor de edad.</br>"; 
}
?>
<?php
if (strstr($_POST['mail'], '@', true)){
    echo "Su mail es " . htmlspecialchars($_POST['mail']) . "</br>";
}
else{
    echo "Mail incorrecto.</br>";
}
?>