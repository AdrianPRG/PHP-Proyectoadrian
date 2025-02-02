<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planetas</title>
    <link rel="shortcut icon" href="../../css/imagenes/SpaceWard.png" type="image/x-icon">
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
                        <th scope="col">Id Planeta</th>
                        <th scope="col">Nombre de Planeta</th>
                        <th scope="col">Temperatura de planeta</th>
                        <th scope="col">Planeta Habitable</th>
                        <th scope="col">Luna de planeta</th>
                        <th scope="col">Id de galaxia</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($planetas as $planeta): ?>
                        <tr>
                            <td><?=$planeta["idPlaneta"]?></td>
                            <td><?=$planeta["nombrePlaneta"]?></td>
                            <td><?=$planeta["temperaturaPlaneta"]?></td>
                            <td><?=($planeta["habitablePlaneta"]==1 ? "Habitable" : "No Habitable")?></td>
                            <td><?=($planeta["lunaPlaneta"]==1 ? "Con Luna" : "Sin Luna")?></td>
                            <td><?=$planeta["Galaxia_idGalaxia"]?></td>
                          </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        
    </main>
</body>

</html>