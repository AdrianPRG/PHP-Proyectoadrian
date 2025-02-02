<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/register.css">
</head>
<body>
    <header>
        <h2>SpaceWard</h2>
    </header>
    <main>
        <div class="divimagen">
            
        </div>
        <div class="divregister">
            <h3>Registro</h3>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="emailRegistro" class="form-label">Email</label>
                    <input
                        required
                        type="email"
                        class="form-control"
                        name="emailRegistro"
                        id="emailRegistro"
                        aria-describedby="emailHelpId"
                        placeholder="ejemplo@gmail.com"
                    />
                    <small id="emailHelpId" class="form-text text-muted"
                        >Introduce tu email</small
                    >
                </div>
                <div class="mb-3">
                    <label for="contraseñaRegistro" class="form-label">Password</label>
                    <input
                        required
                        type="password"
                        class="form-control"
                        name="contraseñaRegistro"
                        id="contraseñaRegistro"
                        placeholder="********"
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Registrarme
                </button>
                <button type="reset" class="btn btn-danger">Borrar</button>
            </form>
            <a style="padding-right:80px;padding-top:20px" href="login">Ya tengo una cuenta</a>
        </div>
    </main>
</body>
</html>