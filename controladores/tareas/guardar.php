<?php
require '../../modelos/Tareas.php';


$tar_app = isset($_POST['tar_app']) ? intval($_POST['tar_app']) : null;


$tar_descripcion = isset($_POST['tar_descripcion']) ? htmlspecialchars($_POST['tar_descripcion']) : '';


$tar_fecha =  date('m/d/Y', strtotime($_POST['tar_fecha']));



if ($tar_app !== null && $tar_app > 0 && $tar_descripcion !== '' && $tar_fecha !== '') {
    try {
   
        $grado = new Tareas([
            'tar_app' => $tar_app,
            'tar_descripcion' => $tar_descripcion,
            'tar_fecha' => $tar_fecha
        ]);     
 
        $resultado = $grado->guardar();

        $resultado = [
            'mensaje' => 'DATO INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
  
    } catch (Exception $e2) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCION ',
            'detalle' => $e2->getMessage(),
            'codigo' => 0
        ];
    }
} else {
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
}

$alertas = ['danger', 'success', 'warning'];

include_once '../../vistas/templates/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?? '' ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
    <a href="../../vistas/grados/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>
