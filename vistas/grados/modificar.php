<?php
 include_once '../templates/header.php' ;
include_once '../templates/navbar.php' ;
require '../../modelos/Grados.php';

    try {
        $_GET['gra_id'] = base64_decode($_GET['gra_id']);
        
        $grado = new Grado($_GET);
        
        $grados = $grado->buscar();
    
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>

    <div class="container">
        <h1 class="text-center">Modificar grado</h1>
        <div class="row justify-content-center">
            <form action="/forma_D/controladores/grados/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="gra_id" value="<?= $grados[0]['gra_id'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_nombre">Grado</label>
                        <input type="text" name="gra_nombre" id="gra_nombre" value="<?= $grados[0]['gra_nombre'] ?>" class="form-control" required>
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