<!DOCTYPE html>
<html>
<head>
    <title>Formulario para Agregar Vehículo</title>
</head>
<body>
    <h2>Formulario para Agregar Vehículo</h2>

    <form action="<?php echo base_url('vehiculo/guardar'); ?>" method="post">
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" required><br><br>

        <!-- Puedes agregar más campos según la estructura de tu tabla -->

        <input type="submit" value="Guardar Vehículo">
    </form>

    <a href="<?php echo base_url('vehiculo/index'); ?>">Volver a la lista de vehículos</a>
</body>
</html>
