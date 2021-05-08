
<?php
ob_start();

?>
<h2> NUEVA PELICULA </h2>
<center>

<form name='ALTA' enctype="multipart/form-data" method="POST" action="index.php?orden=Alta">
<table>

<tr><td>Titulo:   </td><td><input name="nombre" type="text"></td></tr>
<tr><td>Director:  </td><td><input name="director" type="text"></td></tr>
<tr><td>Genero:    </td><td><input name="genero" type="text"></td></tr>
<!--<tr><td>Trailer:    </td><td><input name="trailer" type="text"></td></tr> -->
<tr><td>Cartel:   </td><td><input name="imagen" type="file"></td></tr>

</table><br>
<input type="submit" value="Enviar"><br><br>
<input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
</form>
</center>
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido

$contenido = ob_get_clean();
include_once "principal.php";


?>









