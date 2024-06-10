<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h1 class="text-center">Buscar Armas</h1>
    </div>
    <div class="card-body">
      <form action="/forma_D/controladores/armas/buscar.php" method="GET">
        <div class="mb-3">
          <label for="arma_descripcion" class="form-label">Armas</label>
          <input type="text" name="arma_descripcion" id="arma_descripcion" class="form-control">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-info btn-lg w-100"><i class="bi bi-search me-3"></i>Buscar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php'?>
