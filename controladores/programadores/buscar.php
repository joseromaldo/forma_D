<?php
require '../../modelos/Programadores.php';
$grado1 = $_GET['pro_grado'];
$arma1 = $_GET['pro_arma'];

$_GET['pro_nombre'] = htmlspecialchars($_GET['pro_nombre']);
$_GET['pro_apellido'] = htmlspecialchars($_GET['pro_apellido']);
$_GET['pro_correo'] = htmlspecialchars($_GET['pro_correo']);
$_GET['pro_dpi'] = htmlspecialchars($_GET['pro_dpi']);
$_GET['pro_grado'] = filter_var($grado1, FILTER_VALIDATE_INT);
$_GET['pro_arma'] = filter_var($arma1, FILTER_VALIDATE_INT);


try {

    $programador = new Programador($_GET);
    // exit;   
    $programadores = $programador->buscar();

    $resultado = [
        'mensaje' => 'DATOS ENCONTRADOS',
        'datos' => $grados,
        'codigo' => 1
    ];
    if (empty($programadores)) {
    
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
        <a href="../../vistas/grados/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
    </div>
</div>
<h1 class="text-center">Listado de grados</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead class="table">
                <tr>
                    <th>NO. </th>
                    <th>NOMBRES</th>
                    <th>CORREO</th>
                    <th>DPI</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($programadores) > 0) : ?>
                    <?php foreach ($programadores as $key => $programador) : ?>
                        <tr>
                            
                            <td><?= $key + 1 ?></td>
                            <td><?= $programador['nombre'] ?></td>
                            <td><?= $programador['pro_correo'] ?></td>
                            <td><?= $programador['pro_dpi'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/forma_D/vistas/programador/modificar.php?pro_id=<?= base64_encode($programadore['pro_id']) ?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="/forma_D/controladores/programadores/eliminar.php?pro_id=<?= base64_encode($programador['pro_id']) ?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
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

<script>
    // function alerta_eliminar(id){
    //     if(confirm("¿Esta segurdo que desea eliminar este registro?")){
    //         location.href = "/crud_2024/controladores/producto/eliminar.php?prod_id=" + id
    //     }
    // }
</script>
<?php include_once '../../vistas/templates/footer.php'; ?>