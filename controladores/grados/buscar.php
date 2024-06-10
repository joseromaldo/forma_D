<?php
require '../../modelos/Grados.php';

$_GET['gra_nombre'] = htmlspecialchars( $_GET['gra_nombre']);

try {
  
    $grado = new Grado($_GET);
    // exit;
    
    $grados = $grado->buscar();

    $resultado = [
        'mensaje' => 'DATOS ENCONTRADOS',
        'datos' => $grados,
        'codigo' => 1
    ];
    if (empty($grados)) {
    
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
        <a href="../../vistas/grados/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
    </div>
</div>
<h1 class="text-center">Listado de grados</h1>
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
                <?php if($resultado['codigo'] == 1 && count($grados) > 0) : ?>
                    <?php foreach ($grados as $key => $grado) : ?>
                        <tr>
                            <td><?= $key + 1?></td>
                            <td><?= $grado['gra_nombre'] ?></td>                        
                            <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Acciones
                                </button>
                                <ul class="dropdown-menu">
                                    
                                    <li><a class="dropdown-item" href="/forma_D/vistas/grados/modificar.php?gra_id=<?= base64_encode($grado['gra_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                    <li><a class="dropdown-item" href="/forma_D/controladores/grados/eliminar.php?gra_id=<?= base64_encode($grado['gra_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                </ul>
                            </div>

                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <str colspan="4">No hay registros</td>
                    </tr>  
                <?php endif ?>
            </tbody>
                    
        </table>
    </div>        
</div>        

<script>

    // function alerta_eliminar(id){
    //     if(confirm("¿Esta segurdo que desea eliminar este registro?")){
    //         location.href = "/crud_2024/controladores/producto/eliminar.php?prod_id=" + id
    //     }
    // }

</script>
<?php include_once '../../vistas/templates/footer.php'; ?>  