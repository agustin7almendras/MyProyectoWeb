<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TABLA DE CONDUCTORES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">DataTables</li>
                 <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
                  <button type="button" class="btn btn-danger">Cerrar cesion</button>
                 </a>
            </ol>

          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

             <!---->
            <div class="card" >
              <!---->
              <div class="card-header">                

    
                <h1>USUARIO numero UNO</h1>
              <br>
             <!-- PARA QUE CARGUE EL NOMBRE DEL USUARIO-->
              <h3>
                Login: <?php echo $this->session->userdata('login'); ?> <br>
                id: <?php echo $this->session->userdata('idusuario'); ?> <br>
                tipo: <?php echo $this->session->userdata('tipo'); ?> <br>
              </h3>
             
              <hr>
              <!--BOTON DE  REPORTES DE PDF EDITABLE -->
              <a href="<?php echo base_url(); ?>index.php/estudiante/agregarlte">
                <button type="button" class="btn btn-outline-success">Agregar Conductores Nuevos</button>
              </a>
              

              <!--FIN DIVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV-->
              <!-- /.card-header -->
              <div class="card-body" >
                <!--TABLA PRINCIPAL-->
                <table id="example1" class="">
                  <thead class="bg-info">
                  <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Apellido P.</th> 
                    <th>Apellido M.</th>
                    <th>PLACA</th>
                    <th>Creación</th>
                   <th>Modificar</th>
                    <th>Eliminar</th>
                   <th>Deshabilitar</th>
                   <!-- <th>Foto</th>-->
                  </tr>
                  </thead>
                  <tbody>

            <?php 
				    $indice=1;
				    foreach ($guardame->result() as $row) 
				    {
					  ?>
                  <tr>
                    <td><?php echo $indice; ?></td>
							      <td><?php echo $row->nombre; ?></td> 
							      <td><?php echo $row->primerApellido; ?></td>
							      <td><?php echo $row->segundoApellido; ?></td>
							      <td><?php echo $row->nota; ?></td>
                    <td><?php echo formatearFecha($row->creado); ?></td>

                    <td>
								        <?php //formulario modificar
								        //envia datos hasta agregarbd
								        echo form_open_multipart('estudiante/modificarlte');
								        ?>
								        	<!-- -->
								        	<input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
								        	<button type="submit" class="btn btn-success">MODIFICAR</button>

								        <?php 
								        echo form_close();
								        ?>
							      </td>

                    <td>
								        <?php 
								        //envia datos hasta agregarbd
								        echo form_open_multipart('estudiante/eliminarbdlte');
								        ?>
								        	<!-- ocultamos el id en type -- hidden -->
								        	<input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
								        	<button type="submit" class="btn btn-danger">Eliminar</button>

								        <?php 
								        echo form_close();
								        ?>

							      </td>
                    <!--BOTON DESHABILTAR-->
                    
                    <td>
								        <?php 
								        	//envia datos hasta agregarbd
								        	echo form_open_multipart('estudiante/deshabilitarbdlte');
								        ?>
								        	<!-- ocultamos el id en type -- hidden -->
								        <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
								        	<button type="submit" class="btn btn-warning">DESHABILITAR</button>

								        <?php 
								        echo form_close();
								        ?>
							      </td>
                    

                   <!-- SUBIR FOTO COMENTADO 
                    <td>
                      <?php
                      $foto=$row->foto;
                      if($foto=="")
                      {
                        ?>
                        <img width="100" src="<?php echo base_url(); ?>uploads/estudiantes/perfil.jpg">
                        <?php
                      } 
                      else
                      {
                      ?>
                        <img width="100" src="<?php echo base_url(); ?>uploads/estudiantes/<?php echo $foto; ?>">          
                      <?php 
                      }
                      ?>

                        <?php 
								        	//envia datos hasta agregarbd
								        	echo form_open_multipart('estudiante/subirfoto');
								        ?>
								        	<!-- ocultamos el id en type -- hidden -->
								        	<!--<input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
								        	<button type="submit" class="btn btn-primary">Subir</button> //BOTON FOTO-->

								        <?php 
								        echo form_close();
								        ?>
                    </td>
                     -->  <!--COMENTADO ASTA AQUI-->

                  </tr>
                  <?php
					  $indice++;
				    }				
				    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Apellido P.</th> 
                    <th>Apellido M.</th>
                    <th>Placa</th>
                    <th>Creación</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                   <th>Deshabilitar</th>
                   <!-- <th>Foto</th>-->
                  </tr>                  
                  </tfoot>
                </table>
              </div>

              
                <a href="<?php echo base_url(); ?>index.php/estudiante/agregarlte">
                <button type="button" class="btn btn-success">Crear Conductores Nuevos</button>
                </a>

                <a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitadoslte">
                <button type="button" class="btn btn-warning">Ver lista deshabilitados</button>
                </a>

                
                <a href="<?php echo base_url();?>index.php/estudiante/listapdf" target="_blank"> <!--_blank es para abrir este enlace en una pagina nueva-->
               
                <button type="submit" class="btn btn-primary">Editar reportes en PDF</button>
              </a>

            

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->