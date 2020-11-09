<?php 
    require_once 'conecta.php'; 
 	
    ///////////////////CONSULTA DE VARIAS TABLAS///////////////////////

    $queryLibros = $conn->query("SELECT libro.*, autor.nombre_autor, autor.apellido_autor 
    FROM libro, autor WHERE libro.id_autor = autor.id_autor");

    // $queryAutor = $conn->query("SELECT * FROM autor order by id_autor");

    // $queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");

    // $queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");

    // $queryDisponible = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");
    ?>

    <section>	  

            <table class="table">

                <tr class="info">
                    
                    <th>ESTATUS <br> 0=activo  1=inactivo</th>

                    <th>ISBN</th>

                    <th>TITULO</th>

                    <th>EDICION</th>

                    <th>AÑO</th>

                    <th>DISPONIBILIDAD</th>

                    <th>ACCIONES</th>

                </tr>

                <?php
                while($registroLibro  = $queryLibros->fetch_array( MYSQLI_BOTH)) 

                {?>
                

                <tr style="background-color:#FFF;">

                    <td><?php echo  $registroLibro['estatus'];?></td>
                    
                    <td><?php echo  $registroLibro['id_libro'];?></td>

                    <td><?php echo $registroLibro['titulo'];?></td>

                    <td><?php echo $registroLibro['edicion'];?></td>

                    <td><?php echo $registroLibro['año'];?></td>

                    <td><?php echo $registroLibro['disponibilidad'];?></td>
                    
                    <td> <a href="editar-libro.php?idLibro=<?php echo $registroLibro['id_libro'];?>"><img src="images/editar.png" width="22" height="22" title ="Editar"></a>  <a href="#" id="<?php echo $registroLibro['id_libro'];?>" class="eliminaLibro"><img src="images/eliminar.png" width="24" height="24" title ="Eliminar"></a></td>

                </tr>

                <?php } ?>

                

            </table>

        </div>

            
    </section>
<hr>
		
	

