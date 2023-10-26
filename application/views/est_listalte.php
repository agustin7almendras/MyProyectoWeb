<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> LISTS DE  DE CONDUCTORES</h1>
          </div>
          <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <!--  <li class="breadcrumb-item active">DataTables</li>-->
                 </ol>
                

          </div>
           
        </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->  <!-- EL CONTENIDO DE LA TABLA  -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">  <!--CONTIENNE LAS DOS TABLAS-->
          <div class="col-12">

            
            <div class="card" >
              <!---->
              <div class="card-header">                

    
                <h1>USUARIO ADMINISTRADOR</h1>
              <br>
             <!-- PARA QUE CARGUE EL NOMBRE DEL USUARIO-->
              <h3>
                Login: <?php echo $this->session->userdata('login'); ?> <br>
                id: <?php echo $this->session->userdata('idusuario'); ?> <br>
                tipo: <?php echo $this->session->userdata('tipo'); ?> <br>
              </h3>
             
              <hr>
              <!--BOTON DE  REPORTES DE PDF EDITABLE -->
              <a href="<?php echo base_url(); ?>index.php/conductor/agregarlte">
                <button type="button" class="btn btn-outline-success">Agregar Conductores Nuevos</button>
              </a>
              <button type="button" class="btn btn-segundary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACCIONES

              </button>
              

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
                    <th>telefono</th>
                    <th>LICENCIA</th>
                    <th>Creación</th>
                   <th></th>
                    <th></th>
                   <th>Ds</th>
                   <!-- <th>Foto</th>-->
                  </tr>
                  </thead>
                  <tbody>

            <?php 
				    $indice=1;
				    foreach ($guardame->result() as $row) //
				    {
					  ?>
                  <tr>
                    <td><?php echo $indice; ?></td>
							      <td><?php echo $row->nombre; ?></td> 
							      <td><?php echo $row->primerApellido; ?></td>
							      <td><?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->telefono; ?></td>
							      <td><?php echo $row->numLicencia; ?></td>
                    <td><?php echo formatearFecha($row->creado); ?></td>
                    <!--botn modificar-->
                    <td>
                      <?php
                         echo form_open_multipart('conductor/modificarlte');
                           ?>
                       <input type="hidden" name="idconductor" value="<?php echo $row->idConductor; ?>">
                       <button type="submit" class="btn btn-success">
                                  <i class="far fa-edit"></i>
                        </button>
                      <?php
                      echo form_close();
                      ?>
							      </td>
                  <!--............................BOTON ELIMINAR ............................-->
                    <td>
                    <?php echo form_open_multipart('conductor/eliminarbdlte'); ?>
                    <input type="hidden" name="idconductor" value="<?php echo $row->idConductor; ?>">
                   <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                    <i class="far fa-trash-alt"></i> 
                         </button>
                            <?php echo form_close(); ?>
							      </td>
                    <!--BOTON DESHABILTAR-->
                    
                    <td>
                    <?php
                      echo form_open_multipart('conductor/deshabilitarbdlte');
                    ?>
                       <input type="hidden" name="idconductor" value="<?php echo $row->idConductor; ?>">
                       <button type="submit" class="btn btn-warning">
                           <i class="far fa-times"></i> 
                       </button>
                           <?php
                       echo form_close();
                       ?>
							      </td>
                    

                   <!--campo de susbir foto--------------------------------------------------------->
                   <!--<td>
                      <?php
                      $foto=$row->foto;
                      if($foto=="")
                      {
                        ?>
                        <img width="100" src="<?php echo base_url(); ?>uploads/fotosconductores/perfil.jpg">
                        <?php
                      } 
                      else
                      {
                      ?>
                        <img width="100" src="<?php echo base_url(); ?>uploads/fotosconductores/<?php echo $foto; ?>">          
                      <?php 
                      }
                      ?>

                        <?php 
								        	//envia datos hasta agregarbd
								        	echo form_open_multipart('conductor/subirfoto');
								        ?>
								        
								        	<input type="hidden" name="idconductor" value="<?php echo $row->idConductor; ?>">
								        	<button type="submit" class="btn btn-primary">Subir</button>

								        <?php 
								        echo form_close();
								        ?>
                    </td>-->
                       <!--fin de subir foto-->

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
                    <th>telefono</th>
                    <th>LICENCIA</th>
                    <th>Creación</th>
                    <th></th>
                    <th></th>
                   <th>Ds</th>
                   <!-- <th>Foto</th>-->
                  </tr>                  
                  </tfoot>
                </table>
              </div>

              
                <a href="<?php echo base_url(); ?>index.php/conductor/agregarlte">
                <button type="button" class="btn btn-success">Crear Conductores Nuevos</button>
                </a>

                <a href="<?php echo base_url(); ?>index.php/conductor/deshabilitadoslte">
                <button type="button" class="btn btn-warning">Ver lista deshabilitados</button>
                </a>

                
                <a href="<?php echo base_url();?>index.php/conductor/listapdf" target="_blank"> <!--_blank es para abrir este enlace en una pagina nueva-->
               
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