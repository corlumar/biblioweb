<?
include('autores.php');

$limit=5;
$pag=(int)$_GET['pag'];
if($pag<1)
{
	$pag=1;
}
$offset=($pag-1)*$limit;

$busqueda=$conecta->query("SELECT * FROM autor LIMIT $offset, $limit");
$busquedaTotal=$conecta->query("SELECT * FROM autor");
$total=$busquedaTotal->rowCount();

$tabla.='<table class="table"><tr class="bg-primary">
		<th>NOMBRE AUTOR</th>
	
		<th>GAPELLIDO AUTOR</th></tr>
		 ';

while($autorFila=$busqueda->fetch(PDO::FETCH_ASSOC))
{
	$tabla.='<tr>
				<td>'.$autorFila['nombre_autor'].'</td>
				
				 <td>'.$autorFila['apellido_autor'].'</td></tr>';
}

$tabla.='<tr><td class="text-center" colspan="4">';

	$totalPag=ceil($total/$limit);
	$links=array();
	for($i=1; $i<=$totalPag; $i++)
	{
		$links[]="<a style='border:solid 1px blue; padding-left:.6%; padding-right:.6%; padding-top:.25%; padding-bottom:.25%;' href=\"?pag=$i\">$i</a>";
	}

	$tabla.=''.implode(" ", $links);


$tabla.='</td></tr></table>';
?>