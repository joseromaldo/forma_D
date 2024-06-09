<?php
require '../../modelos/Programadores.php';

$grado1=$_POST['pro_grado'];
$arma1=$_POST['pro_arma'];

$_POST['pro_nombre'] = htmlspecialchars( $_POST['pro_nombre']);  
$_POST['pro_apellido'] = htmlspecialchars( $_POST['pro_apellido']); 
$_POST['pro_correo'] = htmlspecialchars( $_POST['pro_correo']); 
$_POST['pro_dpi'] = htmlspecialchars( $_POST['pro_dpi']); 
$_POST['pro_grado'] = filter_var($grado1, FILTER_VALIDATE_INT);
$_POST['pro_arma'] = filter_var($arma1, FILTER_VALIDATE_INT);



if($_POST['pro_nombre'] != '' && $_POST['pro_apellido'] != '' && $_POST['pro_correo'] != '' && $_POST['pro_dpi'] != '' && $_POST['pro_grado'] > 0 && $_POST['pro_arma'] > 0){
    
    
    try {
        $programador = new Programador($_POST);
        
        $resultado = $programador->modificar();
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
            <a href="../../controladores/programadores/buscar.php?programador=<?= $_POST['programador'] ?>" class="btn btn-info">Volver al formulario</a>
    </div>


<?php include_once '../../vistas/templates/footer.php'; ?>  

