<!DOCTYPE html>
<html>
<head>
    <title>Lista de Vehículos</title>
</head>
<body>
    <h1>Lista de Vehículos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($vehiculos as $vehiculo): ?>
            <tr>
                <td><?= $vehiculo->idVehiculo ?></td>
                <td><?= $vehiculo->marca ?></td>
                <td><?= $vehiculo->tipo ?></td>
                <td><?= $vehiculo->fechaRegistro ?></td>
                <td>
                    <a href="<?= base_url('vehiculo/editar/' . $vehiculo->idVehiculo) ?>">Editar</a>
                    <a href="<?= base_url('vehiculo/eliminar/' . $vehiculo->idVehiculo) ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="<?= base_url('vehiculo/agregar') ?>">Agregar Vehículo</a>
</body>
</html>
