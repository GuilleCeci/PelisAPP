<?php
ob_start();

?>
<center>
<h2> Valorar </h2>
<form name='VAlORAR' enctype="multipart/form-data" method="GET" action="index.php?orden=Valorar">
<table>

<tr><td>Tu valoracion:   </td><td><input name="valoracion" type="text"></td></tr>
<tr><td>Valoracion actual:  </td><td><?= $peli->valoracion ?></td></tr>

</table><br>
<input type="submit" value="Enviar"><br><br>
<input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
</form>
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido

$contenido = ob_get_clean();
include_once "principal.php";


?>