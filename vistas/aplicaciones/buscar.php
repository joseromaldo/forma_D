<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Buscar Aplicaciones</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Buscar Aplicaciones</h1>
        <div class="row justify-content-center">
            <form action="/forma_D/controladores/aplicaciones/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="mb-3">
                    <label for="apl_nombre" class="form-label">Nombre de la Aplicacion</label>
                    <input type="text" name="apl_nombre" id="apl_nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-info w-100"><i class="bi bi-search me-3"></i>Buscar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

    <?php include_once '../templates/footer.php'?>