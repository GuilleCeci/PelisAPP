  
<?php
include_once 'app/Pelicula.php';
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
$auto = $_SERVER['PHP_SELF'];

?>
<table>
<th><form  name='f2' action='index.php'>
<input type='hidden' name='orden' value='Alta'> 
<input type='submit' value='Añadir pelicula' >
</form></th>
</table>
<br>
<table>
<th>Buscar: &#128270</th>
<th><form action="index.php" method="GET">
	<input type="text" name="busqueda"><th>
	<input type='submit' name='orden' value='Titulo'>
	<input type='submit' name='orden' value='Director'>
	<input type='submit' name='orden' value='Genero'></th>
</form></th>


</table>
<br>
<div class="global" style="height: 625px; overflow-y: scroll;">
<table>
<th>Código</th><th>Nombre</th><th>Director</th><th>Genero</th><th>Opciones</th> 



<?php foreach ($peliculas as $peli) : ?>
<tr>		

<td><?= $peli->codigo_pelicula ?></td>
<td><?= $peli->nombre ?></td>
<td><?= $peli->director ?></td>
<td><?= $peli->genero ?></td>
<td>
<a href="#"	onclick="confirmarBorrar('<?= $peli->nombre."','".$peli->codigo_pelicula."'"?>);">Borrar</a><br>
<a href="<?= $auto?>?orden=Valorar&codigo=<?=$peli->codigo_pelicula?>">Valorar</a><br>
<a href="<?= $auto?>?orden=Detalles&codigo=<?= $peli->codigo_pelicula?>">Detalles</a><br>
</td>


</tr>
<?php endforeach; ?>
</table>
</div>
<br>

<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>