<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>
<?php
require '../../modelos/Grados.php';
require '../../modelos/Armas.php';
try {
    $grado = new Grado($_GET);
    $Grados = $grado->buscar();

    $arma = new Arma($_GET);
    $Armas = $arma->buscar();

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>
<div class="container mt-5">
    <h1 class="text-center mt-3">Formulario del Registro de Programadores</h1>
    <div class="row justify-content-center mt-2">
        <form action="/forma_D/controladores/programadores/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="pro_nombre" class="fs-5">Nombres:</label>
                <input type="text" class="form-control" name="pro_nombre" id="pro_nombre" required>
            </div>
            <div class="form-group mb-3">
                <label for="pro_apellido" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="pro_apellido" id="pro_apellido" required>
            </div>
            <div class="form-group mb-3">
                <label for="prog_grados" class="fs-5">Grado:</label>
                <select class="form-select" name="pro_grado" id="pro_grado" required>
                    <option value="">Seleccionar grado</option>
                    <?php foreach ($Grados as $grado) : ?>
                        <option value="<?= $grado['gra_id'] ?>"><?= $grado['gra_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="pro_arma" class="fs-5">Arma:</label>
                <select class="form-select" name="pro_arma" id="pro_arma" required>
                    <option value="">Seleccionar arma</option>
                    <?php foreach ($Armas as $arma) : ?>
                        <option value="<?= $arma['arma_id'] ?>"><?= $arma['arma_descripcion'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="pro_dpi" class="fs-5">DPI:</label>
                <input type="text" class="form-control" name="pro_dpi" id="pro_dpi" required>
            </div>
            <div class="form-group mb-3">
                <label for="pro_correo" class="fs-5">Correo:</label>
                <input type="email" class="form-control" name="pro_correo" id="pro_correo" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg w-100"><i class="bi bi-floppy me-2"></i>Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once '../templates/footer.php' ?>
