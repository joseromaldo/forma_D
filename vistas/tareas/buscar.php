<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Buscar tarea</h1>
        <div class="row justify-content-center">
            <form action="/forma_D/controladores/tareas/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_nombre">Ingrese el nombre de la Tarea</label>
                        <input type="text" name="tar_app" id="tar_app" class="form-control" >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100"><i class="bi bi-search me-3"></i>Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once '../templates/footer.php'?>