<?php
require_once 'Conexion.php';

class Grado extends Conexion{
    public $gra_id;
    public $gra_nombre;
    public $gra_sit;


    public function __construct($args = [] )
    {
        $this->gra_id = $args['gra_id'] ?? null;
        $this->gra_nombre = $args['gra_nombre'] ?? '';
        $this->gra_sit = $args['gra_sit'] ?? 1;
    }

    public function guardar(){
        $sql = "INSERT INTO grados(gra_nombre, gra_sit) VALUES ('$this->gra_nombre','$this->gra_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM grados WHERE gra_sit = 1";

        if($this->gra_nombre != ''){
            $sql .= " AND gra_nombre LIKE '%$this->gra_nombre%'";
        }

        if($this->gra_sit != ''){
            $sql .= " AND gra_sit = '$this->gra_sit'";
        }

        if($this->gra_id != null){
            $sql .= " AND gra_id = $this->gra_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE grados SET gra_nombre = '$this->gra_nombre', gra_sit = '$this->gra_sit' WHERE gra_id = $this->gra_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM grados WHERE gra_id = $this->gra_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}