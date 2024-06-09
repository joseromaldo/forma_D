<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>
<div class="container mt-5">
  <h1 class="text-center mt-3">Grado del Oficial</h1>
  <div class="row justify-content-center mt-2">
    <form action="/forma_D/controladores/grados/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
      <div class="row mb-3">
        <div class="col">
          <label for="grado" class="form-label">Ingrese un grado</label>
          <input type="text" name="gra_nombre" id="gra_nombre" class="form-control" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include_once '../templates/footer.php'?>