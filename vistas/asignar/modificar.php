<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>
<?php
require '../../modelos/Programadores.php';
require '../../modelos/Aplicacion.php';
require '../../modelos/Asignar.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_GET['asi_id'] = filter_var(base64_decode($_GET['asi_id']), FILTER_SANITIZE_NUMBER_INT);






$asignacion = new Asignar($_GET);
$asignaciones = $asignacion->buscarnom();

$aplicacion = new Aplicacion();
$Aplicaciones = $aplicacion->buscar();

$programador = new Programador();
$programadores = $programador->buscar();
// echo var_dump($programadores);
// exit;



?>


<div class="container">
    <h1 class="text-center">Modificar asignaciones de aplicaciones</h1>
    <div class="row justify-content-center">
        <form action="/forma_D/controladores/asignar/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="asi_id" id="asi_id" value="<?= isset($asignaciones[0]['asi_id']) ? $asignaciones[0]['asi_id'] : '' ?>">

            <div class="row mb-3">
                <div class="col">
                    <label for="aplicacion">Aplicación</label>
                    <select class="form-select" name="asi_aplicacion" id="asi_aplicacion" required>
                        <option value="">Seleccionar..</option>
                        <?php foreach ($Aplicaciones as $aplicacion) { ?>
                            <option value="<?= $aplicacion['apl_id']; ?>" <?= (isset($asignaciones[0]['apl_id']) && $aplicacion['apl_id'] == $asignaciones[0]['apl_id']) ? 'selected' : '' ?>>
                                <?= $aplicacion['apl_nombre'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="programador">Programador</label>
                    <select class="form-select" name="asi_programador" id="asi_programador" required>
                        <option value="">Seleccionar..</option>
                        <?php foreach ($programadores as $programador) { ?>
                            <option value="<?= $programador['pro_id']; ?>" <?= (isset($asignaciones[0]['pro_id']) && $programador['pro_id'] == $asignaciones[0]['pro_id']) ? 'selected' : '' ?>>
                                <?= $programador['nombre'] ?>
                            </option>
                        <?php } ?>
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

<?php include_once '../templates/footer.php'; ?>