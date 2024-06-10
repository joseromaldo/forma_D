<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header text-black">
      <h1 class="text-center">Arma del Oficial</h1>
    </div>
    <div class="card-body">
      <form action="/forma_D/controladores/armas/guardar.php" method="POST">
        <div class="mb-3">
          <label for="arma_descripcion" class="form-label">Ingrese el arma</label>
          <input type="text" name="arma_descripcion" id="arma_descripcion" class="form-control" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary w-100"><i class="bi bi-floppy me-2"></i>Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php'?>
