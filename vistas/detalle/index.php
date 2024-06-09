<?php include_once '../templates/header.php'?>
<?php include_once '../templates/navbar.php'?>
<?php

require '../../modelos/Asignar.php';
$nombre = new Asignar();

$nombres = $nombre->buscarnom2();

?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table">
                        <tr>
                            <th>NO. </th>
                            <th>APLICACIÓN</th>
                            <th>VER</th>
                          
                        </tr>
                    </thead>
                    <tbody>
    <?php if (count($nombres) > 0) : ?>
        <?php foreach ($nombres as $key => $tar) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $tar['apl_nombre'] ?></td>
                <td>
                    <?php if ($tar['apl_id'] !='') { ?>
                        <a class="btn btn-warning w-75%" href="/forma_D/vistas/detalle/buscar.php?tar_id=<?= $tar['apl_id'] ?>"> ver</a>
                    <?php } else { ?>
                        no asignada aún
                    <?php } ?>
                </td>
                
            </tr>
        <?php endforeach ?>
    <?php else : ?>
        <tr>
            <td colspan="4">NO EXISTEN REGISTROS</td>
        </tr>
    <?php endif ?>
</tbody>

                </table>
            </div>
        </div>
      
    </div>

<?php include_once '../templates/footer.php'?>