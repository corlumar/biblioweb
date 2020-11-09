<style>
    #data tr {
  display: none;
}
  
</style>
<?php
require_once 'conecta.php';



//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
 
    	

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if($_POST['coda']!=''){
$q=$conn->real_escape_string($_POST['coda']);
$query ="SELECT libro.*, autor.nombre_autor, autor.apellido_autor
FROM libro, autor WHERE libro.id_autor = autor.id_autor AND 
autor.nombre_autor  like '%$q%'";
}else{
$q=$conn->real_escape_string($_POST['coda']);
$query ="SELECT libro.*, autor.nombre_autor, autor.apellido_autor
FROM libro, autor WHERE libro.id_autor = autor.id_autor";	
}
//   echo $query;
//   exit;
 

$buscarPrestamo=$conn->query($query);
if ($buscarPrestamo->num_rows > 0)
{?>
 	<table id="data" border="1" align="center">
		<tr>
			<th>ISBN</th>	
			<th>TITULO</th>	
			<th>DISPONIBILIDAD</th>
			<th>NOMBRE AUTOR</th>
			<th>APELLIDO AUTOR</th>		
			<th>ACCIONES</th>
		</tr>;
	<?php
	while($filaPrestamo= $buscarPrestamo->fetch_assoc())
	{
		$idlibro = $filaPrestamo['id_libro'];
		$titulo = $filaPrestamo['titulo'];
	 ?>
		<tr> 
			<td><?php echo $filaPrestamo['id_libro'];?></td>
			<td><?php echo $filaPrestamo['titulo'];?></td>
			<td><?php echo $filaPrestamo['disponibilidad'];?></td>
			<td><?php echo $filaPrestamo['nombre_autor'];?></td>
			<td><?php echo $filaPrestamo['apellido_autor'];?></td>	
			<td><a href="#modal1" class="prestalibro" id='<?php echo $idlibro;?>'>PRESTAR</a></td>
		 </tr>
 		
	<?php } ?>

    </table>
 	<?php 
} else
	{
		?>
		No se encontraron coincidencias con sus criterios de búsqueda.
		<?php
	}


?>


<style>
    .modalmask {
    position: fixed;
    font-family: Arial, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0,0,0,0.8);
    z-index: 99999;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
}
.modalmask:target {
    opacity:1;
    pointer-events: auto;
}
.modalbox{
    width: 300px;
    position: relative;
    /* padding: 5px 20px 13px 20px; */
    background: #fff;
    border-radius:3px;
    -webkit-transition: all 500ms ease-in;
    -moz-transition: all 500ms ease-in;
    transition: all 500ms ease-in;
     
}
.movedown {
    margin: 0 auto;
}
 
 
.modalmask:target .movedown{       
    margin:3% auto;
}
.close {
    background: #606061;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: 1px;
    text-align: center;
    top: 1px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    border-radius:3px;
 
}
 
.close:hover {
    background: #FAAC58;
    color:#222;
}


</style>
 
<div id="modal1" class="modalmask">
    <div class="modalbox movedown">
		 
        <a href="#close" title="Cerrar" class="close">x</a>
       
        <form action="guarda_prestamo.php" method="POST">
			 
			<label for="alumnos">Codigo del libro</label>
			<input type="text" name="code_libro" id="code_libro" readonly>

            <label for="alumnos">Matricula Del Alumno</label>
			<input type="text" name="alumno" id="alumno" readonly>
			
			<label for="alumnos">Fecha de préstamo</label>
			<input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>">

            <?php
            $entrega = strtotime($date."+ 3 days");
    
            ?>
			<label for="alumnos">Devolución</label>
			<input type="date" name="fechad" id="fechad" value="<?php  echo date("Y-m-d",$entrega);?>">
			
			<!-- <label for="alumnos">Encargado</label>
			<input type="text" name="encargado" id="encargado"> -->
			
			<input type="submit" value="Guardar Préstamo">
		    </form>
     </div>
</div>

</div>
<script>
    $(document).ready(function(){
    $('#data').after('<div id="nav"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
});
</script>