  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LLENE EL FORMULARIO AGREGAR NUEVO CONDUCTOR</h1>
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
                <h3 class="card-title">Agregar nuevo conductor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
			  <?php 
			//envia datos hasta agregarbd
			echo form_open_multipart('conductor/agregarbdlte');
			?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Escriba el nombre">
                  </div>
				  <div class="form-group">
                    <label for="">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellido1" placeholder="Escriba el primer apellido">
                  </div>
				  <div class="form-group">
                    <label for="">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellido2" placeholder="Escriba el segundo apellido">
                  </div>
                  <div class="form-group">
                    <label for="">Placa</label>
                    <input type="pastext" class="form-control" name="nota" placeholder="Escriba la Placa">
                  </div>                  
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
              
			  <?php 
			echo form_close();
			?>
            </div>

          </div>        
        </div>       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
