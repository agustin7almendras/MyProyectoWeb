<!DOCTYPE html>
<html>
<head>
    <title>Formulario para Editar Vehículo</title>
</head>
<body>
    <h2>Formulario para Editar Vehículo</h2>

    <form action="<?php echo base_url('vehiculo/guardar'); ?>" method="post">
        <input type="hidden" name="idVehiculo" value="<?php echo $vehiculo->idVehiculo; ?>">
        <!-- Asegúrate de tener el campo idVehiculo como campo oculto para identificar el vehículo a editar -->

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="<?php echo $vehiculo->marca; ?>" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" value="<?php echo $vehiculo->tipo; ?>" required><br><br>

        <!-- Puedes agregar más campos según la estructura de tu tabla -->

        <input type="submit" value="Guardar Cambios">
    </form>

    <a href="<?php echo base_url('vehiculo/index'); ?>">Volver a la lista de vehículos</a>
</body>
</html>
