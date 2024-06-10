<?php include_once '../templates/header.php' ?>
<?php include_once '../templates/navbar.php' ?>

<?php
require '../../modelos/Armas.php';
    try {
      
        $_GET['arma_id'] = filter_var( base64_decode($_GET['arma_id']), FILTER_SANITIZE_NUMBER_INT);
        $arma = new Arma($_GET);
        
        $armas = $arma->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>

    <div class="container">
        <h1 class="text-center">Modificar Arma</h1>
        <div class="row justify-content-center">
            <form action="/forma_D/controladores/armas/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="arma_id" value="<?= $armas[0]['arma_id'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="arma_descripcion">Arma</label>
                        <input type="text" name="arma_descripcion" id="arma_descripcion" value="<?= $armas[0]['arma_descripcion'] ?>" class="form-control" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100"><i class="bi bi-pencil-square me-2"></i>Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../templates/footer.php'?>