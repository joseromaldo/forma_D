<?php
require_once 'Conexion.php';

class Arma extends Conexion{
    public $arma_id;
    public $arma_descripcion;
    public $arma_situacion;


    public function __construct($args = [] )
    {
        $this->arma_id = $args['arma_id'] ?? null;
        $this->arma_descripcion = $args['arma_descripcion'] ?? '';
        $this->arma_situacion = $args['arma_situacion'] ?? 1;
    }

    public function guardar(){
        $sql = "INSERT INTO armas(arma_descripcion, arma_situacion) VALUES ('$this->arma_descripcion','$this->arma_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM armas WHERE arma_situacion = 1";

        if($this->arma_descripcion != ''){
            $sql .= " AND arma_descripcion LIKE '%$this->arma_descripcion%'";
        }

        if($this->arma_situacion != ''){
            $sql .= " AND arma_situacion = '$this->arma_situacion'";
        }

        if($this->arma_id != null){
            $sql .= " AND arma_id = $this->arma_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE armas SET arma_descripcion = '$this->arma_descripcion', arma_situacion = '$this->arma_situacion' WHERE arma_id = $this->arma_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM armas WHERE arma_id = $this->arma_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}