<?php
include_once '../templates/header.php' ;
 include_once '../templates/navbar.php';
require '../../modelos/Tareas.php';
require '../../modelos/Aplicacion.php';

try {
    $_GET['tar_id'] = filter_var( base64_decode($_GET['tar_id']), FILTER_SANITIZE_NUMBER_INT);
    $tarea = new Tareas($_GET);
    $Tareas = $tarea->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


try {
      
    $app = new Aplicacion();
    
    $Aplicacion = $app->buscar();

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>


<div class="container">
    <h1 class="text-center">Modificar Tareas</h1>
    <div class="row justify-content-center">
        <form action="/forma_D/controladores/tareas/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
        <input type="hidden" name="tar_id" id="tar_id" value="<?= isset($Tareas[0]['tar_id']) ? $Tareas[0]['tar_id'] : '' ?>">

            <div class="row mb-3">
                <div class="col">
                    <label for="aplicacion">Aplicación</label>
                    <select name="tar_app" id="tar_app" class="form-select" required>
                        <?php foreach ($Aplicacion as $app) : ?>
                            <option value="<?= $app['apl_id'] ?>" <?= ($app['apl_nombre'] === $Tareas[0]['apl_nombre']) ? 'selected' : '' ?>><?= $app['apl_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea">Tarea</label>
                    <textarea name="tar_descripcion" id="tar_descripcion" class="form-control" rows="4" required><?= $Tareas[0]['tar_descripcion'] ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="fecha_asignacion">Fecha de Asignación</label>
                    <input type="date" name="tar_fecha" id="tar_fecha" value="<?= $Tareas[0]['tar_fecha'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../templates/footer.php' ?>