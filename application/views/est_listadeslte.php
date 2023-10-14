<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Conducres Deshabilitados</h1>
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

			          <a href="<?php echo base_url(); ?>index.php/conductor/indexlte">
				        <button type="button" class="btn btn-warning">Ver lista habilitados</button>
			          </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Apellido P.</th>
                    <th>Apellido M.</th>
                    <th>telfono</th>
                    <th>PLACA</th>
                    <th>Habilitar</th>
                  </tr>
                  </thead>
				  
                  <tbody>

            <?php 
				    $indice=1;
				    foreach ($conductortbl->result() as $row) // tabla condutortbl
				    {
					  ?>
                  <tr>
                    	<td><?php echo $indice; ?></td>
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->primerApellido; ?></td>
						<td><?php echo $row->segundoApellido; ?></td>
            <td><?php echo $row->telefono; ?></td>
						<td><?php echo $row->numLicencia; ?></td>

                    <td>
								        <?php 
								        	//envia datos hasta agregarbd
								        	echo form_open_multipart('conductor/habilitarbdlte');// hibilita y se actializa ahi nomas
								        ?>
								        	<!-- ocultamos el id en type -- hidden -->
								        	<input type="hidden" name="idconductor" value="<?php echo $row->idConductor; ?>">
								        	<button type="submit" class="btn btn-warning">HABILITAR</button>

								        <?php 
								        echo form_close();
								        ?>
							      </td>

                  </tr>
                  <?php
					  $indice++;
				    }				
				    ?>
                  </tbody>
                 
                </table>
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
