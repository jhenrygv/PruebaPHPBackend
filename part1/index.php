<?php

include 'ChangeString.php';
include 'CompleteRange.php';
include 'ClearPar.php';

echo "<h4>ChangeString.php </h4><hr>";
echo "<small>Usando PHP, crear una clase llamada ChangeString ​que tenga un método llamado build
el cual tome un parámetro string que debe ser modificado por el siguiente algoritmo .
Reemplazar cada letra de la cadena con la letra siguiente en el alfabeto. Por ejemplo
reemplazar a​ por b​ ó c​ por d.​ Finalmente devolver la cadena</small>";

$code = '
$t = new ChangeString();
echo  $t ->build("**Casa 52Z");
';

echo "<blockquote><pre>$code</pre></blockquote>";
echo "<pre><b>Output:</b><br/>";
eval($code);
echo "</pre>";

echo "<h4>CompleteRange.php </h4><hr>";
echo "<small>Usando PHP, crear una clase llamada CompleteRange ​que tenga un método
llamado build ​el cual tome un parámetro de colección de números enteros
positivos (1,2,3, ...n). El algoritmo debe completar si faltan números en la
colección en el rango dado. Finalmente devolver la colección completa.
</small>";


$code = '
$t = new CompleteRange();
print_r ($t ->build([2,4,9]));
';

echo "<blockquote><pre>$code</pre></blockquote>";
echo "<pre><b>Output:</b><br/>";
eval($code);
echo "</pre>";

echo "<h4>ClearPar.php </h4><hr>";
echo "<small>Usando PHP, crear una clase llamada ClearPar ​que tenga un método llamado
build ​que reciba como parámetro una cadena formada sólo por paréntesis
(()()()()(()))))())((()​). El algoritmo debe eliminar todos los paréntesis que no tienen
pareja.Finalmente devolver la nueva cadena.
</small>";

$code = '
$t = new ClearPar();
echo $t ->build("()())()");
';

echo "<blockquote><pre>$code</pre></blockquote>";
echo "<pre><b>Output:</b><br/>";
eval($code);
echo "</pre>";