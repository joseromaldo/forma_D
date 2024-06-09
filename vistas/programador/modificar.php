<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>

<?php
require '../../modelos/Programadores.php';
require '../../modelos/Grados.php';
require '../../modelos/Armas.php';

try {
    $_GET['pro_id'] = filter_var( base64_decode($_GET['pro_id']), FILTER_SANITIZE_NUMBER_INT);
    $tarea = new Programador($_GET);
    $Programadores = $tarea->buscar2();
  
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

try {
    $grado = new Grado();
    $Grados = $grado->buscar();
    $arma = new Arma();
    $Armas = $arma->buscar();
    //var_dump($Grados);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
si

<div class="container mt-5">
    <h1 class="text-center mt-3">Formulario para modificar el Programador</h1>
    <div class="row justify-content-center mt-2">
        <form action="/forma_D/controladores/programadores/modificar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="pro_nombre" class="fs-5">Nombres:</label>
                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="<?= $Programadores[0]['pro_id'] ?? '' ?>" required>
                <input type="text" class="form-control" name="pro_nombre" id="pro_nombre" value="<?= $Programadores[0]['pro_nombre'] ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="pro_apellido" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="pro_apellido" id="pro_apellido" value="<?= $Programadores[0]['pro_apellido']  ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="pro_grado" class="fs-5">Grado:</label>
                <select class="form-select" name="pro_grado" id="pro_grado" required>
                    <option value="">Seleccionar grado</option>
                    <?php foreach ($Grados as $grado) : ?>
                        <option value="<?= $grado['gra_id'] ?>" <?= ($Programadores[0]['pro_grado'] ?? '') == $grado['gra_id'] ? 'selected' : '' ?>>
                            <?= $grado['gra_nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="pro_arma" class="fs-5">Arma:</label>
                <select class="form-select" name="pro_arma" id="pro_arma" required>
                    <option value="">Seleccionar arma</option>
                    <?php foreach ($Armas as $arma) : ?>
                        <option value="<?= $arma['arma_id'] ?>" <?= ($Programadores[0]['pro_arma'] ?? '') == $arma['arma_id'] ? 'selected' : '' ?>>
                            <?= $arma['arma_descripcion'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="pro_dpi" class="fs-5">Correo:</label>
                <input type="text" class="form-control" name="pro_dpi" id="pro_dpi" value="<?= $Programadores[0]['pro_dpi'] ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="pro_correo" class="fs-5">Correo:</label>
                <input type="email" class="form-control" name="pro_correo" id="pro_correo" value="<?= $Programadores[0]['pro_correo'] ?? '' ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </form>
    </div>
</div>

<?php include_once '../templates/footer.php' ?>