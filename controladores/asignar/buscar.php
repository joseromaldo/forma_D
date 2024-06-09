<?php
require '../../modelos/Asignar.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$programador1 = $_GET['asi_programador'] ?? null;
$aplicacion1 = $_GET['asi_aplicacion'] ?? null;

$_GET['asi_programador'] = filter_var($programador1, FILTER_VALIDATE_INT);
$_GET['asi_aplicacion'] = filter_var($aplicacion1, FILTER_VALIDATE_INT);

try {
    $asignacion = new Asignar($_GET);
    $asignaciones = $asignacion->buscarnom();

    if (!empty($asignaciones)) {
        $resultado['mensaje'] = 'DATOS ENCONTRADOS'; 
        $resultado['codigo'] = 1;
    } else { 
        $resultado['mensaje'] = 'No hay datos';
        $resultado['codigo'] = 0;
    }
  
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
    $asignaciones = [];  
}

$alertas = ['danger', 'success', 'warning'];
include_once '../../vistas/templates/header.php'; 
?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo'] ?? 1] ?>" role="alert">
        <?= $resultado['mensaje'] ?? 'DATOS ENCONTRADOS' ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/asignar/buscar.php" class="btn btn-primary w-100">Volver al formulario de búsqueda</a>
    </div>
</div>
<h1 class="text-center">Listado de asignaciones</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead class="table table-bordered table-hover">
                <tr>
                    <th>NO.</th>
                    <th>PROGRAMADOR</th>
                    <th>APLICACIÓN</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($asignaciones) && count($asignaciones) > 0) : ?>
                    <?php foreach ($asignaciones as $key => $asignacion1) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= htmlspecialchars($asignacion1['nombre']) ?></td>
                            <td><?= htmlspecialchars($asignacion1['apl_nombre']) ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/forma_D/vistas/asignar/modificar.php?asi_id=<?= base64_encode($asignacion1['asi_id']) ?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="/forma_D/controladores/asignar/eliminar.php?asi_id=<?= base64_encode($asignacion1['asi_id']) ?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay registros</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // function alerta_eliminar(id){
    //     if(confirm("¿Esta seguro que desea eliminar este registro?")){
    //         location.href = "/crud_2024/controladores/producto/eliminar.php?prod_id=" + id
    //     }
    // }
</script>
<?php include_once '../../vistas/templates/footer.php'; ?>
