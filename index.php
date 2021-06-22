<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Sistema de Notas</title>
</head>
<body class="bg-dark">
    <div class="container-fluid d-flex justify-content-center align-items-center h-75 w-75 mt-5">
        <div class="transparent border border-2 p-5 mt-5 text-center shadow-lg">
            <h1 class="fs-2 p-3 text-light">Student<span class="fw-bold">Rating</span></h1>

            <form action="Usuarios/Controladores/login.php" method="POST">
            <i class="bi bi-person-circle text-light" style="font-size: 7rem;"></i>
            <legend class="pb-2 fs-2 text-light">Iniciar sesión</legend>
                <label for="Usuario" class="visually-hidden">Usuario</label>
                <input type="text" autocomplete="off" required="" placeholder="Usuario" name="Usuario" class="form-control mb-3 p-2">
                <label for="Contrasena" class="visually-hidden">Contraseña</label>
                <input type="password" autocomplete="off" required="" placeholder="Contraseña" name="Contrasena" class="form-control mb-3 p-2">
                <input type="submit" value="Iniciar Sesión" class="btn btn-md w-100 btn-primary rounded-pill px-3 py-2">
                <?php
                    if(isset($_GET['error'])):
                        $error = $_GET['error'];
                        if($error = 'invalid'):
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">Usuario o contraseña incorrecto
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;
                    endif;
                ?>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
