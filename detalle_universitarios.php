<?php 
    require_once 'conecta.php'; 
 	
    ///////////////////CONSULTA DE VARIAS TABLAS///////////////////////

    $queryUniversitarios = $conn->query("SELECT universitario.*, alumno.*, users.*
    FROM universitario, alumno, users 
    WHERE universitario.clave = alumno.clave
    and universitario.id_users = users.id_users");
    
    // $queryAlumno = $conn->query("SELECT * FROM alumno order by clave");

    // $queryAutor = $conn->query("SELECT * FROM autor order by id_autor");

    // $queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");

    // $queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");

    // $queryDisponible = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");
    ?>

    <section>	  

            <table class="table">

                <tr class="info">
                    
                    <th>ESTATUS <br> 0=activo  1=inactivo</th>

                    <th>CLAVE</th>

                    <th>CARRERA</th>

                    <th>TURNO</th>

                    <th>TELEFONO</th>

                    <th>EMAIL</th>

                    <th>ACCIONES</th>

                </tr>

                <?php 
                while($registroUniversitario  = $queryUniversitarios->fetch_array( MYSQLI_BOTH)) 

                {?>
                

                <tr style="background-color:#FFF;">

                    <td><?php echo $registroUniversitario['estatus'];?></td>
                    
                    <td><?php echo $registroUniversitario['clave'];?></td>

                    <td><?php echo $registroUniversitario['turno'];?></td>

                    <td><?php echo $registroUniversitario['telefono'];?></td>

                    <td><?php echo $registroUniversitario['email'];?></td>

                    <td> <a href="editar_alumno1.php?idLibro=<?php echo $registroUniversitario['clave'];?>"><img src="images/editar.png" width="22" height="22" title ="Editar"></a>  <a href="#" id="<?php echo $registroUniversitario['clave'];?>" class="eliminaLibro"><img src="images/eliminar.png" width="24" height="24" title ="Eliminar"></a></td>

                </tr>

                <?php }   ?>

                

            </table>

        </div>

            
    </section>
<hr>
		
	

