<link rel="stylesheet" href="css/mis_estilos.css" rel="stylesheet">

<link rel="stylesheet" href="css/css-tablas.css">

<style>

    
    .modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
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
.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}
.modalDialog > div {
	width: 330px;
	position: relative;
	margin: 5% auto;
	/* padding: 5px 20px 13px 20px; */
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
  -webkit-transition: opacity 400ms ease-in;
-moz-transition: opacity 400ms ease-in;
transition: opacity 400ms ease-in;
}
.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}
.close:hover { background: #00d9ff; }
</style>
<!-- <a href="#openModal">Lanzar el modal</a> -->

<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>      
        <?php
        require_once 'conecta.php';
		 ///////////////////CONSULTA DE VARIAS TABLAS///////////////////////

			$queryLibros = $conn->query("SELECT * FROM libro order by id_libro");

			$queryAutor = $conn->query("SELECT * FROM autor order by id_autor");

			$queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");

			$queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");

			$queryDisponible = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");
			?>
	
			<!-- //////////FORMULARIO PARA INSERTAR DATOS//////////// -->
		<section>
			<form method="post" class="form text-center form-inline col-md-12 bg-info" style="padding-bottom: 1%;">

				<h3 style="text-align: center; color:white">INSERTAR NUEVO LIBRO</h3>

				<input name="id_libro" type="text" placeholder="id_libro" class="form-control form-inline">

				<input name="titulo" type="text" placeholder="titulo" class="form-control form-inline">

				
				<select name="nautor" id="nautor" class="select-css">
				<option selected="true" value="" disabled>seleccione Autor</option>
					<?php
					while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)){ ?>
					<option value="<?php echo $registroAutor['id_autor'];?>"><?php echo $registroAutor['nombre_autor'] . " " .  $registroAutor['apellido_autor'];?></option>
					<?php } ?>
					<option value="nuevo">Nuevo</option>
				</select>
				<br>
				<div id="dAutorNuevo">
					<input name="nombre_autor" type="text" placeholder="nombre_autor" class="form-control form-inline">
					<input name="apellido_autor" type="text" placeholder="apellido_autor" class="form-control form-inline">			
				</div>
				<div id="dAutorexiste">
					<input name="idautor" id="idautor" type="text">
				</div>
				
				<select name="editoriale" id="editoriale" class="select-css">
				<option selected="true" value="" disabled>seleccione Edktorial</option>
					<?php
					while($registroEditorial  = $queryEditorial->fetch_array( MYSQLI_BOTH)){ ?>
					<option value="<?php echo $registroEditorial['id_editorial'];?>"><?php echo $registroEditorial['editorial'];?></option>
					<?php } ?>
					<option value="nueva">Nueva</option>
				</select>

				<div id="editorialNuevo">
					<input name="editorial"  id="editorial" type="text" placeholder="editorial">
				</div>
				<div id="editorialExiste">
					<input name="ideditorial" id="ideditorial" type="text">
				</div>

				
				<input name="edicion" type="text" placeholder="edicion" class="form-control form-inline">

				<input name="año" type="text" placeholder="año" class="form-control form-inline">

				<input name="ciudad" type="text" placeholder="ciudad" class="form-control form-inline">

				<input name="disponibilidad" type="text" placeholder="disponibilidad" class="form-control form-inline">

				<input name="insertar" type="submit" value="Insertar Datos" class="btn btn-info">

            </form>
            <script
			src="https://code.jquery.com/jquery-3.5.0.js"
			integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
			crossorigin="anonymous">
		</script>

		<script>
				$(document).ready(function(){
					$("#dAutorNuevo").hide()
					$("#dAutorexiste").hide()
					$("#editorialNuevo").hide()
					$("#editorialExiste").hide()
					$(document).on('change', '#nautor', function(){
						var cont = $('select[id=nautor]').val();
						if (cont=='nuevo'){
							$("#dAutorNuevo").show()
							$("#dAutorexiste").hide()
						}else{
							$("#dAutorNuevo").hide()
							$("#idautor").val(cont)
						}
					});

					$(document).on('change', '#editoriale', function(){
						var conted= $('select[id=editoriale]').val();
						if (conted=='nueva'){
							$("#editorialNuevo").show()
							$("#editorialExiste").hide()
						}else{
							$("#editorialNuevo").hide()
							$("#ideditorial").val(conted)
						}
					});
				})
		</script>
 	</div>
</div>