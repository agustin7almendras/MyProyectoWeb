<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Vehículo</title>
</head>
<body>
    <h1>Agregar Vehículo</h1>
    
    <?php echo form_open('vehiculo/agregar'); ?>
    
    <label for="placa">Placa:</label>
    <input type="text" name="placa" required><br>
    
    <label for="marca">Marca:</label>
    <input type="text" name="marca" required><br>
    
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" required><br>
    
    <label for="fechaRegistro">Fecha de Registro:</label>
    <input type="date" name="fechaRegistro" required><br>
    
    <label for="estado">Estado:</label>
    <select name="estado">
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select><br>
    
    <input type="submit" value="Agregar">
    
    <?php echo form_close(); ?>
    
    <a href="<?php echo base_url('vehiculo'); ?>">Volver a la lista de vehículos</a>
</body>
</html>
