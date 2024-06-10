<?php
require '../../modelos/Tareas.php';


if (isset($_GET['tar_id'])) {
    $_GET['tar_id'] = filter_var(base64_decode($_GET['tar_id']), FILTER_SANITIZE_NUMBER_INT);
} else {
    $resultado = [
        'mensaje' => 'ID NO VÁLIDO',
        'detalle' => 'El ID de la tarea no está presente o es inválido.',
        'codigo' => 0
    ];
}

try {
    if (isset($_GET['tar_id']) && $_GET['tar_id']) {
        $tarea = new Tareas(['tar_id' => $_GET['tar_id']]);
        $eliminar = $tarea->eliminar();

        $resultado = [
            'mensaje' => 'DATO ELIMINADO CORRECTAMENTE',
            'codigo' => 1,
            'detalle' => ''
        ];
    } else {
        throw new Exception('ID de tarea no válido o no proporcionado');
    }
} catch (PDOException $e) {
  
    if ($e->getCode() == '23000') {
        $resultado = [
            'mensaje' => 'No se puede eliminar la tarea porque está siendo referenciada por otras entradas.',
            'detalle' => '',
            'codigo' => 0
        ];
    } else {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA BD',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
} catch (Exception $e2) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCION',
        'detalle' => $e2->getMessage(),
        'codigo' => 0
    ];
}

$alertas = ['danger', 'success', 'warning'];

include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= isset($resultado['detalle']) ? $resultado['detalle'] : '' ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/tareas/buscar.php" class="btn btn-primary w-100">Volver a los resultados</a>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>
