<?php
require '../../modelos/Grados.php';

$_POST['gra_nombre'] = htmlspecialchars( $_POST['gra_nombre']);

if($_POST['gra_nombre'] != '' ){
    
    
    try {
        $grado = new Grado($_POST);
        
        $resultado = $grado->modificar();
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
            <a href="../../controladores/grados/buscar.php?grados=<?= $_POST['grado'] ?>" class="btn btn-info">Volver al formulario</a>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  

