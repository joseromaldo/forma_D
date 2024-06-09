<?php include_once '../templates/header.php'; ?>
<?php include_once '../templates/navbar.php'; ?>
<?php
require '../../modelos/Aplicacion.php';

$app = new Aplicacion();
$Aplicaciones = $app->buscar();

?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE TAREAS</h1>
  <div class="row justify-content-center mt-2">
    <form action="/forma_D/controladores/tareas/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
      <div class="form-group">
        <label for="tar_app">Seleccione una aplicación:</label>
        <select class="form-select" name="tar_app" id="tar_app" required>
          <option selected>Seleccionar aplicación</option>
          <?php foreach ($Aplicaciones as $app) { ?>
            <option value="<?= $app['apl_id']; ?>"><?= $app['apl_nombre']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tar_descripcion">Descripción de la tarea:</label>
        <textarea class="form-control" name="tar_descripcion" id="tar_descripcion" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="tar_fecha">Fecha de asignación:</label>
        <input type="date" class="form-control" name="tar_fecha" id="tar_fecha" required>
      </div>
      <div class="row mb-3">
        <div class="col">
          <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include_once '../templates/footer.php'; ?>
