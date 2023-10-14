<!-- Formulario para editar un vehículo -->
<form action="<?php echo base_url('vehiculo/actualizar/' . $vehiculo->idVehiculo); ?>" method="post">
    <label for="placa">Placa:</label>
    <input type="text" name="placa" value="<?php echo $vehiculo->placa; ?>" required>
    <br>
    <label for="marca">Marca:</label>
    <input type="text" name="marca" value="<?php echo $vehiculo->marca; ?>" required>
    <br>
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" value="<?php echo $vehiculo->tipo; ?>" required>
    <br>
    <input type="submit" value="Actualizar">
</form>
<a href="<?php echo base_url('vehiculo'); ?>">Volver a la lista</a>
