<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Buscar Armas</h1>
        <div class="row justify-content-center">
            <form action="/forma_D/controladores/armas/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="arma_descripcion">Armas</label>
                        <input type="text" name="arma_descripcion" id="arma_descripcion" class="form-control" >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once '../templates/footer.php'?>