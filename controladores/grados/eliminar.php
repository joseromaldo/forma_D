<?php
require '../../modelos/Grados.php';

try {
    if (isset($_GET['gra_id']) && $_GET['gra_id']) {
        $_GET['gra_id'] = filter_var(base64_decode($_GET['gra_id']), FILTER_SANITIZE_NUMBER_INT);
        
        $grado = new Grado(['gra_id' => $_GET['gra_id']]);
        $eliminar = $grado->eliminar();

        $resultado = [
            'mensaje' => 'DATO ELIMINADO CORRECTAMENTE',
            'codigo' => 1,
            'detalle' => ''
        ];
    } else {
        throw new Exception('ID de grado no válido o no proporcionado');
    }
} catch (PDOException $e) {
   
    if ($e->getCode() == '23000') {
        $resultado = [
            'mensaje' => 'No se puede eliminar el grado porque está siendo referenciado por otras tablas .',
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
?>

<?php include_once '../../vistas/templates/header.php'; ?>
<?php include_once '../../vistas/templates/navbar.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= isset($resultado['detalle']) ? $resultado['detalle'] : '' ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/grados/buscar.php" class="btn btn-primary w-100">Volver a los resultados</a>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>
