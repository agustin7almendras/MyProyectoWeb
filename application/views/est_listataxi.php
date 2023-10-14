<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Taxis</title>
</head>
<body>
    <h1>Lista de Taxis</h1>
    <a href="<?php echo base_url('vehiculo/agregar'); ?>">Agregar Taxi</a>

    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Fecha de Registro</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiculos as $vehiculo) { ?>
                <tr>
                    <td><?php echo $vehiculo['placa']; ?></td>
                    <td><?php echo $vehiculo['marca']; ?></td>
                    <td><?php echo $vehiculo['tipo']; ?></td>
                    <td><?php echo $vehiculo['fechaRegistro']; ?></td>
                    <td><?php echo $vehiculo['estado']; ?></td>
                    <td>
                        <a href="<?php echo base_url('vehiculo/editar/' . $vehiculo['id']); ?>">Editar</a>
                        <a href="<?php echo base_url('vehiculo/eliminar/' . $vehiculo['id']); ?>" onclick="return confirm('¿Estás seguro de eliminar este vehículo?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
