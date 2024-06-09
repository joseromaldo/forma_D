<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>
<?php
require '../../modelos/Aplicacion.php';
    try {
        $_GET['apl_id'] = filter_var( base64_decode($_GET['apl_id']), FILTER_SANITIZE_NUMBER_INT);
        $aplicacion = new Aplicacion($_GET);
        
        $aplicaciones = $aplicacion->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>

    <div class="container">
        <h1 class="text-center">Modificar Aplicacion</h1>
        <div class="row justify-content-center">
            <form action="/forma_D/controladores/aplicaciones/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="apl_id" value="<?= $aplicaciones[0]['apl_id'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="apl_nombre">Aplicacion</label>
                        <input type="text" name="apl_nombre" id="apl_nombre" value="<?= $aplicaciones[0]['apl_nombre'] ?>" class="form-control" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../templates/footer.php'?>