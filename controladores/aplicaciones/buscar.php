<?php
require '../../modelos/Aplicacion.php';

$_GET['apl_nombre'] = htmlspecialchars( $_GET['apl_nombre']);

try {
  
    $aplicacion = new Aplicacion ($_GET);
     
    $aplicaciones = $aplicacion->buscar();
    

    $resultado = [
        'mensaje' => 'DATOS ENCONTRADOS',
        'datos' => $aplicaciones,
        'codigo' => 1
    ];
    if (empty($aplicaciones)) {
    
        $resultado['mensaje'] = 'No hay datos';
        $resultado['codigo'] = 0;
    }

} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}       


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/aplicaciones/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
    </div>
</div>
<h1 class="text-center">Listado de aplicaciones</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>            
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($resultado['codigo'] == 1 && count($aplicaciones) > 0) : ?>
                    <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                        <tr>
                            <td><?= $key + 1?></td>
                            <td><?= $aplicacion['apl_nombre'] ?></td>                        
                            <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Acciones
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/forma_D/vistas/aplicaciones/modificar.php?apl_id=<?= base64_encode($aplicacion['apl_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                    <li><a class="dropdown-item" href="/forma_D/controladores/aplicaciones/eliminar.php?apl_id=<?= base64_encode($aplicacion['apl_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                </ul>
                            </div>

                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No hay registros</td>
                    </tr>  
                <?php endif ?>
            </tbody>
                    
        </table>
    </div>        
</div>        

<?php include_once '../../vistas/templates/footer.php'; ?>  