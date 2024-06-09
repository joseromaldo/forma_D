<?php
require '../../modelos/Asignar.php';
require '../../modelos/Aplicacion.php';
$pogramador1=$_POST['asi_programador'];
$aplicacion1=$_POST['asi_aplicacion'];


$_POST['asi_programador'] = filter_var($pogramador1, FILTER_VALIDATE_INT);
$_POST['asi_aplicacion'] = filter_var($aplicacion1, FILTER_VALIDATE_INT);


if($_POST['asi_programador'] >0 && $_POST['asi_aplicacion'] >0 ) {


    try {
        $asignacion = new Asignar($_POST);
        $resultado = $asignacion->guardar();
    
        $resultado = [
            'mensaje' => 'DATO INSERTADO CORRECTAMENTE',
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
} else {
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
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
    <a href="../../vistas/asignar/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>