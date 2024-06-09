<?php
include_once '../templates/header.php';
include_once '../templates/navbar.php';

require '../../modelos/Aplicacion.php';
require '../../modelos/Asignar.php';
require '../../modelos/Tareas.php';








$asig_app = $_REQUEST['tar_id'] ?? null;
$nombre = new Asignar(['asig_app' => $asig_app]);

$nombres = $nombre->buscarnom();





$tar_app = $_REQUEST['tar_id'] ?? null;
$tarea = new Tareas(['tar_app' => $tar_app]);
$tare = $tarea->buscartar();


$totalTareas = count($tare);
$totalPorcentaje = 0;
$porcentajePorEstado = [
    1 => 0,    // No iniciado
    2 => 50,   // En proceso
    3 => 100   // Finalizado
];

foreach ($tare as $tar) {
    $totalPorcentaje += $porcentajePorEstado[$tar['tar_estado']];
}

$porcentajeTrabajoRealizado = ($totalPorcentaje / $totalTareas);

if (is_nan($porcentajeTrabajoRealizado)) {
    $porcentajeTrabajoRealizado = 0.00;
}


?>



<body>
    <div class="container border bg-light py-4 mt-4">
        <h1 class="mt-4">Detalle </h1>

        <div class="row mt-4">
            <div class="col">
                <h5>Nombre de la Aplicación:</h5>
            </div>
            <div class="col">
                <input type="text" class="form-control" value="<?= $nombres[0]['apl_nombre'] ?>" readonly>

            </div>
        </div>

        <div class="row mt-4">
            <div class="col">

                <h5>Programador asignado :</h5>
            </div>
            <div class="col">
                <input type="text" class="form-control" value="<?= $nombres[0]['nombre'] ?>" readonly>
            </div>
        </div>

        <h5 class="mt-4 text-center">Tareas por realizar:</h5>
        <table class="table table-bordered mt-2">
            <thead class="table">
                <tr>
                    <th scope="col" class="text-center">NO.</th>
                    <th scope="col" class="text-center">TAREA</th>
                    <th scope="col" class="text-center">FECHA DE REALIZACION</th>
                    <th scope="col" class="text-center">ESTADO</th>

                </tr>
            </thead>
            <tbody>
                <?php if (count($tare) > 0) : ?>
                    <?php foreach ($tare as $key => $tar) : ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td class="text-center"><?= $tar['tar_descripcion'] ?></td>
                            <td class="text-center"><?= $tar['tar_fecha'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = "";
                                $estadoClass = "";
                                switch ($tar['tar_estado']) {
                                    case 1:
                                        $estado = "NO INICIADA";
                                        $estadoClass = "bg-danger";
                                        break;
                                    case 2:
                                        $estado = "EN PROCESO";
                                        $estadoClass = "bg-warning";
                                        break;
                                    case 3:
                                        $estado = "FINALIZADA";
                                        $estadoClass = "bg-success";
                                        break;
                                }
                                ?>
                                <span class="badge <?= $estadoClass ?>"><?= $estado ?></span>
                                <br>
                                <br>
                                <a class="btn btn-warning  btn-sm w-100" href="/forma_D/vistas/detalle/modificar.php?tar_id=<?= $tar['tar_id'] ?>">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay tareas disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


        <div class="row">
            <div class="col">
                <h5>Porcentaje de trabajo realizado:</h5>
                <div class="d-flex justify-content-center">
                    <p class="h3"><?= number_format($porcentajeTrabajoRealizado, 2) ?>%</p>
                </div>

            </div>
        </div>


        <?php include_once '../templates/footer.php' ?>
</body>