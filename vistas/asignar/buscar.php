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
    //var_dump($progras);

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>


<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>
<div class="container">
    <h1 class="text-center">Buscar aplicaciones asignadas</h1>
    <div class="row justify-content-center">
        <form action="/forma_D/controladores/asignar/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
            <div class="form-group">
                <label for="asi_aplicacion">Seleccione una aplicación:</label>
                <select class="form-select" name="asi_aplicacion" id="asi_aplicacion">
                    <option value="">Seleccionar..</option>
                    <?php foreach ($Aplicaciones as $aplicacion1) { ?>
                        <option value="<?php echo $aplicacion1['apl_id']; ?>"><?php echo $aplicacion1['apl_nombre']; ?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="aplicacion">Seleccione un programador</label>
                <select class="form-select" name="asi_programador" id="asi_programador">
                    <option value="">Seleccionar..</option>
                    <?php foreach ($programadores as $programador) { ?>
                        <option value="<?php echo $programador['pro_id']; ?>"><?php echo $programador['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-info w-100">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../templates/footer.php' ?>