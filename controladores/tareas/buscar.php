<?php
require '../../modelos/Tareas.php';

$_GET['tar_app'] = htmlspecialchars($_GET['tar_app']);
$_GET['tar_descripcion'] = htmlspecialchars($_GET['tar_descripcion']);
$_GET['tar_fecha'] = htmlspecialchars($_GET['tar_fecha']);

try {

    $grado = new Tareas($_GET);

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
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/tareas/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
    </div>
</div>
<h1 class="text-center">Listado de tareas</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO. </th>
                    <th>APLICACIÓN</th>
                    <th>TAREA</th>
                    <th>ACCIONES</th>
                
                </tr>
            </thead>
            <tbody>
                <?php if (count($grados) > 0) : ?>
                    <?php foreach ($grados as $key => $tar) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $tar['apl_nombre'] ?></td>
                            <td><?= $tar['tar_descripcion'] ?></td>
                            <td><?= $tar['tar_fecha'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/forma_D/vistas/tareas/modificar.php?tar_id=<?= base64_encode($tar['tar_id']) ?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="/forma_D/controladores/tareas/eliminar.php?tar_id=<?= base64_encode($tar['tar_id']) ?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
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