<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/general.css">
</head>

<body>
    <header>
        <h4>Spaceforward</h4>
    </header>
    <main>
        <h2 style="color:blue;font-weight:bold"><i>Insertar Expedicion</i></h2>
        <div class="">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nombreExpedicion" class="form-label">Nombre de Expedicion</label>
                    <input required type="text" class="form-control" name="nombreExpedicion" id="nombreExpedicion" aria-describedby="emailHelpId" placeholder="Camino a planeta Raktus" />
                    <small id="emailHelpId" class="form-text text-muted">Introduce nombre de expedicion</small>
                </div>
                <div class="mb-3">
                    <label for="FechaExpedicion" class="form-label">Fecha de Expedicion</label>
                    <input required type="date" class="form-control" name="FechaExpedicion" id="FechaExpedicion" aria-describedby="emailHelpId" placeholder="Camino a planeta Raktus" />
                    <small id="emailHelpId" class="form-text text-muted">Introduce la fecha de expedicion</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Id Tripulacion</label>
                    <select required class="form-select form-select-lg" name="Tripulacion_idTripulacion" id="">
                        <?php foreach ($resultados as $tripulacion): ?>
                            <option value="<?= (int)$tripulacion['idTripulacion'] ?>">
                                <?= (int)$tripulacion['idTripulacion'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">
                        Insertar
                    </button>
                    <a class="btn btn-danger" href="/expediciones">Volver atras</a>
                </div>


            </form>
    </main>
</body>

</html>