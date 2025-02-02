<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expedicion </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/general.css">
</head>

<body>
    <header>
        <h4>SpaceForward</h4>
    </header>
    <main>
        <h3 class="mb-4">Detalles de expedicion</h3>
        <div
            class="table-responsive container col-sm-8">
            <table
                class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Campo</th>
                        <th scope="col">Valor</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img class="imgTD" src="/css/imagenes/id.png" alt=""></td>
                        <td>Id de expedicion</td>
                        <td><?= $expedicionUnica["idExpedicion"] ?></td>
                    <tr>
                        <td><img class="imgTD" src="/css/imagenes/name.png" alt=""></td>
                        <td>Nombre de expedicion</td>
                        <td><?= $expedicionUnica["nombreExpedicion"] ?></td>

                    </tr>
                    <tr>
                        <td><img class="imgTD" src="/css/imagenes/date.png" alt=""></td>
                        <td>Fecha de expedicion</td>
                        <td><?= $expedicionUnica["FechaExpedicion"] ?></td>
                    </tr>
                    <tr>
                        <td><img class="imgTD" src="/css/imagenes/crew.png" alt=""></td>
                        <td>Id de Tripulacion</td>
                        <td><?= $expedicionUnica["Tripulacion_idTripulacion"] ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="/expediciones" class="btn btn-primary">Volver atras</a>
        </div>
        <div style="display: flex;justify-content:center;align-items:center;flex-direction:column">
           <h3>Datos relacionados</h3>
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultadosTablaRelacionada as $tripulacion): ?>
                        <tr>
                            <td><?php echo $tripulacion['idTripulacion']; ?></td>
                            <td><?php echo $tripulacion['nombreTripulacion']; ?></td>
                            <td><?php echo $tripulacion['contactoTripulacion']; ?></td>
                            <td><?php echo $tripulacion['estadoTripulacion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
           </div>
        </div>
    </main>

</body>

</html>