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
    <main class="descubrimiento">
        <div
            class="table-responsive container col-sm-8"
        >
            <table
                class="table table-dark"
            >
                <thead>
                    <tr>
                        <th scope="col">Id Descubrimiento</th>
                        <th scope="col">Detalles de Descubrimiento</th>
                        <th scope="col">Id de Expedicion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($descubrimientos as $descubrimiento): ?>
                        <tr>
                            <td><?=$descubrimiento["idDescubrimiento"]?></td>
                            <td><?=$descubrimiento["detallesDescubrimiento"]?></td>
                            <td><?=$descubrimiento["Expedicion_idExpedicion"]?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        
    </main>


</body>

</html>