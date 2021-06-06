<?php
ob_start();

?>
<center>
<h2> Detalles </h2>
<form name='MODIFICAR' enctype="multipart/form-data" method="POST" action="index.php?orden=Modificar">

<table>
<tr><td>Nombre   </td><td><input type="text" value="<?= $peli->nombre ?>"></td></tr>
<tr><td>Director  </td><td><input type="text" value="<?= $peli->director ?>"></td></tr>
<tr><td>Genero    </td><td><input type="text" value="<?= $peli->genero ?>"></td></tr>
<tr><td>Imagen   </td><td><input type="file" value="<img src="<?='app/img/'.$peli->imagen; ?>" height="380" width="240"></img>">   
</td></tr>
<tr><td>Trailer    </td><td><input type="text"></td></tr>

</table>
</center>
<input type="submit" value="Enviar"><br><br>
<input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
</form>
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido

$contenido = ob_get_clean();
include_once "principal.php";


?>  