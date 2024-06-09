<?php
require '../../modelos/Armas.php';
$_GET['arma_descripcion'] = htmlspecialchars($_GET['arma_descripcion']);

try {

    $arma = new Arma($_GET);

    $armas = $arma->buscar();

    
    $resultado = [
        'mensaje' => 'DATOS ENCONTRADOS',
        'datos' => $armas,
        'codigo' => 1
    ];
    if (empty($armas)) {
    
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
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/armas/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
    </div>
</div>
<h1 class="text-center">Listado de armas</h1>
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
                <?php if ($resultado['codigo'] == 1 && count($armas) > 0) : ?>
                    <?php foreach ($armas as $key => $arma) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $arma['arma_descripcion'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/forma_D/vistas/armas/modificar.php?arma_id=<?= base64_encode($arma['arma_id']) ?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="/forma_D/controladores/armas/eliminar.php?arma_id=<?= base64_encode($arma['arma_id']) ?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">No hay registros</td>
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