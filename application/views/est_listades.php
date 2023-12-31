<h1>Inicio</h1>
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<a href="<?php echo base_url(); ?>index.php/estudiante/index">
				<button type="button" class="btn btn-warning">Ver lista habilitados</button>
			</a>

			<h1>Lista de estudiantes DESHABILITADOS</h1>

			<table class="table" >
				<tr>
					<td>No</td>
					<td>Nombre</td>
					<td>Apellido P.</td>
					<td>Apellido M.</td>
					<td>Nota</td>
					<td>Habilitar</td>
				</tr>

				<?php 
				$indice=1;
				foreach ($estudiantes->result() as $row) 
				{
					?>
						<tr>
							<td><?php echo $indice; ?></td>
							<td><?php echo $row->nombre; ?></td>
							<td><?php echo $row->primerApellido; ?></td>
							<td><?php echo $row->segundoApellido; ?></td>
							<td><?php echo $row->nota; ?></td>

							<td>
								<?php 
									//envia datos hasta agregarbd
									echo form_open_multipart('estudiante/habilitarbd');
								?>
									<!-- ocultamos el id en type -- hidden -->
									<input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
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

			</table>
		</div>

	</div>

</div>
