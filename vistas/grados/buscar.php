<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>
<div class="container mt-5">
  <h1 class="text-center mb-4">Buscar Grados</h1>
  <div class="row justify-content-center">
    <form action="/forma_D/controladores/grados/buscar.php" method="GET" class="col-lg-8 bg-white p-4 shadow rounded">
      <div class="mb-3">
        <label for="gra_nombre" class="form-label">Grado del Oficial</label>
        <input type="text" name="gra_nombre" id="gra_nombre" class="form-control" placeholder="Ej. Capitán">
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-info btn-lg"><i class="bi bi-search me-3"></i>Buscar</button>
      </div>
    </form>
  </div>
</div>
<?php include_once '../templates/footer.php' ?>
