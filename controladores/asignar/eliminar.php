<?php
require '../../modelos/Asignar.php';

$_GET['asi_id'] = filter_var( base64_decode($_GET['asi_id']), FILTER_SANITIZE_NUMBER_INT);

try {
    $asignacion = new Asignar($_GET);
    $eliminar = $asignacion->eliminar();

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


$alertas = ['danger', 'success', 'warning'];

include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/asignar/buscar.php" class="btn btn-primary w-100">Volver a los resultados</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?> 