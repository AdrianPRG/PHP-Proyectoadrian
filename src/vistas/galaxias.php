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
    <main class="galaxia">
        <div
            class="table-responsive container col-sm-8"
        >
            <table
                class="table table-dark"
            >
                <thead>
                    <tr>
                        <th scope="col">Id Gakaxia</th>
                        <th scope="col">Nombre Galaxia</th>
                        <th scope="col">Diametro Galaxia</th>
                        <th scope="col">Distancia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($galaxias as $galaxia): ?>
                        <tr>
                            <td><?=$galaxia["idGalaxia"]?></td>
                            <td><?=$galaxia["nombreGalaxia"]?></td>
                            <td><?=$galaxia["diametroGalaxia"]?></td>
                            <td><?=$galaxia["distanciaGalaxia"]?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        
    </main>


</body>

</html>