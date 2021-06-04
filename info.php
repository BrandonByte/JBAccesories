phpinfo();


<?php
function prueba(){
    $mockData = 10;
    $expected = 100;
    $person = new Person();
    $result = $person -> weigth($mockData);

    if($result==$expected){
        echo "Success";
    }
}
?>



<?php
function foo($bar)
{
     return $bar;
}
?>

--TEST--
foo() function - Una prueba básica para ver si funciona.
--FILE--
<?php
include 'lib.php'; //podría necesitar ajustar la ruta si no está en el mismo directorio
$bar = 'Hola Mundo';
var_dump(foo($bar));
?>
--EXPECT--
string(11) "Hola Mundo"











?>