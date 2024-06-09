<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>
<?php
require '../../modelos/Tareas.php';
require '../../modelos/Aplicacion.php';

    


if (isset($_GET['tar_id'])) {
    $tar_id = $_GET['tar_id'];
    
    $tarea = new Tareas(['tar_id' => $tar_id]);
    $Tareas = $tarea->buscartar_id();

}



?>


<div class="container">
    <h1 class="text-center">Modificar Estado</h1>
    <div class="row justify-content-center">
        <form action="/forma_D/controladores/detalle/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="tar_id" id="tar_id" value="<?= $Tareas[0]['tar_id'] ?>">
            <input type="hidden" name="tar_app" id="tar_app" value="<?= $Tareas[0]['tar_app'] ?>">
            <div class="row mb-3">
           
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea">Tarea</label>
                    <textarea name="tar_descripcion" id="tar_descripcion" class="form-control" rows="4" required><?= $Tareas[0]['tar_descripcion'] ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="estado">Estado</label>
                    <select name="tar_estado" id="tar_estado" class="form-control" required>
                        <option value="1" <?php if ($Tareas[0]['tar_estado'] == 1) echo 'selected' ?>>NO INICIADO</option>
                        <option value="2" <?php if ($Tareas[0]['tar_estado'] == 2) echo 'selected' ?>>EN PROCESO</option>
                        <option value="3" <?php if ($Tareas[0]['tar_estado'] == 3) echo 'selected' ?>>FINALIZADO</option>
                    </select>
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


<?php include_once '../templates/footer.php'?>