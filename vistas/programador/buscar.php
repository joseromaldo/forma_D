<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Buscar Programador</h1>
        <div class="row justify-content-center">
            <form action="/forma_D/controladores/programadores/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="pro_nombre">Nombre Progamador</label>
                        <input type="text" name="pro_nombre" id="pro_nombre" class="form-control" >
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