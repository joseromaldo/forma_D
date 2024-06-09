<?php
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $apl_id;
    public $apl_nombre;
    public $apl_estado;


    public function __construct($args = [] )
    {
        $this->apl_id = $args['apl_id'] ?? null;
        $this->apl_nombre = $args['apl_nombre'] ?? '';
        $this->apl_estado = $args['apl_estado'] ?? 1;
    }

    public function guardar(){
        $sql = "INSERT INTO aplicacion (apl_nombre, apl_estado) VALUES ('$this->apl_nombre','$this->apl_estado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM aplicacion  WHERE apl_estado = 1";

        if($this->apl_nombre != ''){
            $sql .= " AND apl_nombre LIKE '%$this->apl_nombre%'";
        }

        if($this->apl_estado != ''){
            $sql .= " AND apl_estado = '$this->apl_estado'";
        }

        if($this->apl_id != null){
            $sql .= " AND apl_id = $this->apl_id";
        }

    
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscart(){
        $sql = "SELECT * FROM aplicacion  WHERE apl_estado in (1,2,3,4,5)";

        if($this->apl_nombre != ''){
            $sql .= " AND apl_nombre LIKE '%$this->apl_nombre%'";
        }

            if($this->apl_id != null){
            $sql .= " AND apl_id = $this->apl_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarapp(){
        $sql = "SELECT * FROM aplicacion  WHERE apl_estado in (1,2,3,4,5) AND apl_id = $this->apl_id";



        $resultado = self::servir($sql);
        return $resultado;
    }





    public function modificar(){
        $sql = "UPDATE aplicacion  SET apl_nombre = '$this->apl_nombre', apl_estado = '$this->apl_estado' WHERE apl_id = $this->apl_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }



    
    public function modificar2(){
        $sql = "UPDATE aplicacion  SET  apl_estado = '$this->apl_estado' WHERE apl_id = $this->apl_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM aplicacion  WHERE apl_id = $this->apl_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
