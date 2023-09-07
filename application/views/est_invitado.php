<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ESTO ES UNA PAGINA DE INVITADO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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


            <div class="card">
              <div class="card-header">               
                <h3 class="card-title">Pulse para salir de invitado Invitado</h3>
                <br>
              

			          

                <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
				        <button type="button" class="btn btn-danger">Cerrar cesion</button>
			          </a>

              <br>
              <h3>
              <!--  Login: <?php echo $this->session->userdata('login'); ?> <br>
                id: <?php echo $this->session->userdata('idusuario'); ?> <br>
                tipo: <?php echo $this->session->userdata('tipo'); ?> <br>
              </h3>
               <h2>HOOOLA</h2>  -->

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h2>BIENVENIDO !!!</h2>
                  <!-- name puede llamarse como en la bd pero tambien puede ser independiente -->
        <input type="text" name="nombre" placeholder="Escriba el nombre" class="form-control"> <br>
        <input type="text" name="apellido1" placeholder="Escriba el primer apellido" class="form-control"> <br>
        <input type="text" name="apellido2" placeholder="Escriba el segundo apellido" class="form-control"> <br>
        <input type="text" name="nota" placeholder="Escriba la nota" class="form-control"> <br>
        
        <button type="submit" class="btn btn-success">AGREGAR</button>

                
              </div>
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