<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modificar Conductor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lista de conductores</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
			  <?php 
			foreach ($infoestudiante->result() as $row) //inicio de la recursividad
			{

			
			//envia datos hasta agregarbd
			echo form_open_multipart('conductor/modificarbdlte');
			?>
                <div class="card-body">
					
                  <div class="form-group">
				  <input type="hidden" name="idconductor" class="form-control" value="<?php echo $row->idConductor; ?>">
                    <label for="">Nombre</label>					
                    <input type="text" name="nombre" placeholder="Escriba el nombre" class="form-control" value="<?php echo $row->nombre; ?>">
                  </div>
				  <div class="form-group">
                    <label for="">Apellido Paterno</label>
                    <input type="text" name="apellido1" placeholder="Escriba el primer apellido" class="form-control" value="<?php echo $row->primerApellido; ?>">
                  </div>
				  <div class="form-group">
                    <label for="">Apellido Materno</label>
                    <input type="text" name="apellido2" placeholder="Escriba el segundo apellido" class="form-control" value="<?php echo $row->segundoApellido; ?>">
                  </div>
                  <div class="form-group">
                    <label>telefono </label>
                    <input type="text" name="telefono" placeholder="Escriba numero de telefono " class="form-control" value="<?php echo $row->telefono; ?>">
                  </div> 
                  <div class="form-group">
                    <label>Numero de licencia </label>
                    <input type="text" name="numLicencia" placeholder="Escriba numero de licencia " class="form-control" value="<?php echo $row->numLicencia; ?>">
                  </div>                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">MODIFICAR</button>
                </div>
              
				<?php 
			echo form_close();
			}
			?>
            </div>

          </div>        
        </div>       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
