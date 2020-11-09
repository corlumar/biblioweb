<?php
require_once 'conecta.php';



//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
 
    	

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['clave']))
{
	$q=$conn->real_escape_string($_POST['clave']);
	$query="SELECT  u.estatus, u.clave, q.id_users, q.nombre, u.apellido_pat, u.apellido_mat, q.email, q.password 
      FROM users q
      INNER join universitario u 
      ON  u.id_users = q.id_users
      WHERE clave
      LIKE '%$q%'";
}

$buscarAlumno=$conn->query($query);
if ($buscarAlumno->num_rows > 0)
{?>
 	<table id="data" border="1" align="center">
		<tr>
			<th>ESTATUS</th>
			<th>CLAVE</th>	
			<th>USUARIO</th>	
			<th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>APELLIDO MATERNO</th>
			<th>EMAIL</th>
			<th>ACCIONES</th>
		</tr>;
	<?php
	while($filaBusqueda= $buscarAlumno->fetch_assoc())
	{
		$clave = $filaBusqueda['clave'];
		$users = $filaBusqueda['id_userso'];
	 ?>
		<tr> 
			<td><?php echo $filaBusqueda['estatus'];?></td>
			<td><?php echo $filaBusqueda['clave'];?></td>
			<td><?php echo $filaBusqueda['usuario'];?></td>
			<td><?php echo $filaBusqueda['nombre'];?></td>
			<td><?php echo $filaBusqueda['apellido_pat'];?></td>
			<td><?php echo $filaBusqueda['apellido_mat'];?></td>
			<td><?php echo $filaBusqueda['email'];?></td>
			<td><?php echo $filaBusqueda['acciones'];?></td>
			
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
    width: 330px;
    position: relative;
    /* padding: 5px 20px 13px 20px; */
    background-color: #43434c8c;
    background: #fff;
    border-radius:10px;
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
            <br>
			<input type="text" name="code_libro" id="code_libro" readonly>
            <br>
            <label for="alumnos">Matricula Del Alumno</label>
            <br>
			<input type="text" name="alumno" id="alumno" readonly>
			<br>
            <label for="alumnos">Fecha de préstamo</label>
            <br>
			<input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>">
            <br>
            <?php
            $entrega = strtotime($date."+ 3 days");
    
            ?>
            <label for="alumnos">Devolución</label>
            <br>
			<input type="date" name="fechad" id="fechad" value="<?php  echo date("Y-m-d",$entrega);?>">
			<br>
			<!-- <label for="alumnos">Encargado</label>
			<input type="text" name="encargado" id="encargado"> -->
			
			<input type="submit" id="enviaSolicitud" value="Envíar Solicitud">
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

    // $(document).on('click', '.cicloactual', function(){
    //         cargar_productos();                      
    //     });

});
</script>