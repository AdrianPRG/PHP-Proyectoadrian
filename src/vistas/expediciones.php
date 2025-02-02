<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/general.css">
</head>

<body>
    <header>
        <h4>SpaceForward</h4>
    </header>
    <main class="expedicion">
        <div class="mb-4">
        <a href="inicio" class="btn btn-danger">Volver atras</a>
        <a href="expediciones/insertarExpedicion" class="btn btn-success">Insertar Expedicion</a>
        </div>
        <div
            class="table-responsive container col-sm-8">
            <table
                class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id expedicion</th>
                        <th scope="col">Nombre expedicion</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($expediciones as $expedicion): ?>
                        <tr>
                            <td><?= $expedicion["idExpedicion"] ?></td>
                            <td><?= $expedicion["nombreExpedicion"] ?></td>
                            <td>
                                <a href="expediciones/<?= $expedicion["idExpedicion"] ?>" class="btn btn-primary"> Ver </a>
                            </td>
                            <td>
                                <a href="expediciones/<?= $expedicion["idExpedicion"] ?>/actualizar" class="btn btn-warning"> Actualizar </a>
                            </td>
                            <td>
                                <a href="expediciones/<?=$expedicion["idExpedicion"]?>/eliminar" class="btn btn-danger"> Eliminar </a>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </main>


</body>

</html>