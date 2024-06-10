<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>
<?php
require '../../modelos/Aplicacion.php';
require '../../modelos/Programadores.php';
try {

  $aplicacion = new Aplicacion();

  $Aplicaciones = $aplicacion->buscar();
} catch (PDOException $e) {
  $error = $e->getMessage();
} catch (Exception $e2) {
  $error = $e2->getMessage();
}


try {

  $programador = new Programador();


  $programadores = $programador->buscar();
  

} catch (PDOException $e) {
  $error = $e->getMessage();
} catch (Exception $e2) {
  $error = $e2->getMessage();
}

?>
<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE APLICACIONES</h1>
  <div class="row justify-content-center mt-2">
    <form action="/forma_D/controladores/asignar/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
      <div class="form-group">
        <label for="asi_aplicacion">Seleccione una aplicación:</label>
        <select class="form-select" name="asi_aplicacion" id="asi_aplicacion" required>
          <option value="">Seleccionar..</option>
          <?php foreach ($Aplicaciones as $aplicacion1) { ?>
            <option value="<?php echo $aplicacion1['apl_id']; ?>"><?php echo $aplicacion1['apl_nombre']; ?></option>

          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="aplicacion">Seleccione un programador</label>
        <select class="form-select" name="asi_programador" id="asi_programador" required>
          <option value="">Seleccionar..</option>
          <?php foreach ($programadores as $programador) { ?>
            <option value="<?php echo $programador['pro_id']; ?>"><?php echo $programador['nombre']; ?></option>
          <?php } ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-3"><i class="bi bi-floppy me-2"></i>Guardar</button>
    </form>
  </div>
</div>


<?php include_once '../templates/footer.php' ?>