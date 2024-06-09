<?php
require '../../modelos/Asignar.php';

$pogramador1=$_POST['asi_programador'];
$aplicacion1=$_POST['asi_aplicacion'];


$_POST['asi_programador'] = filter_var($pogramador1, FILTER_VALIDATE_INT);
$_POST['asi_aplicacion'] = filter_var($aplicacion1, FILTER_VALIDATE_INT);


if($_POST['asi_programador'] >0 && $_POST['asi_aplicacion'] >0 ){
    try {
        $asignacion = new Asignar($_POST);
 
        
        $resultado = $asignacion->modificar();

        $resultado = [
            'mensaje' => 'DATO MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
    
}else {
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
            <a href="../../controladores/asignar/buscar.php?asignar=<?= $_POST['asignar'] ?>" class="btn btn-info">Volver al formulario</a>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  