<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../../css/imagenes/SpaceWard.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/login.css">
</head>

<body>
    <header>
        <h1>SpaceWard</h1>
    </header>
    <main>
        <div class="divMain1">
            <form action="" method="POST">
                <div class="seccionForm" style="padding-bottom: 20px;">
                    <h2>Iniciar Sesion</h2>
                </div>
                <div class="seccionForm">
                    <img src="../../css/imagenes/usuario.png" width="50px" height="50px" alt="">
                    <div class="mb-3">
                        <label for="emailUsuario" class="form-label"><b>Email</b></label>
                        <input
                            type="text"
                            required
                            size="20"
                            class="form-control"
                            name="emailUsuario"
                            id="emailUsuario"
                            aria-describedby="emailHelpId"
                            placeholder="axel22@gmail.com" />
                        <small id="emailHelpId">Introduce tu correo electronico</small>
                    </div>
                </div>
                <div class="seccionForm">
                    <img src="../../css/imagenes/password.png" width="50px" height="50px" alt="">
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Password</b></label>
                        <input
                            required
                            type="password"
                            class="form-control"
                            name="passwordUsuario"
                            id="password"
                            placeholder="**********" />
                        <small id="passwordhelp">Introduce una contraseña segura</small>
                    </div>
                </div>
                <div class="seccionForm">
                    <input type="submit" class="btn btn-primary mt-2 mb-3" value="Iniciar Sesion">
                </div>
                <a href="registro" style="padding-left:20px;padding-top:20px">🌓 No tengo cuenta..</a>
            </form>
        </div>
        <div class="divMain2">
        </div>

    </main>

</body>

</html>