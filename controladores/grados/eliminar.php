<?php
require '../../modelos/Grados.php';

$_GET['gra_id'] = filter_var( base64_decode($_GET['gra_id']), FILTER_SANITIZE_NUMBER_INT);
try {
    $grado = new Grado($_GET);
    $eliminar = $grado->eliminar();

    $resultado = [
        'mensaje' => 'DATO ELIMINADO CORRECTAMENTE',
        'codigo' => 1
    ];
} catch (PDOException $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
} catch (Exception $e2) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCION ',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
}


$alertas = ['danger', 'success', 'warning']; ?>

<?php include_once '../../vistas/templates/header.php'; ?>
<?php include_once '../../vistas/templates/navbar.php'; ?>


<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/grados/buscar.php" class="btn btn-primary w-100">Volver a los resultados</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?> 