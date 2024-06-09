<?php
require_once 'Conexion.php';

class Asignar extends Conexion
{
    public $asi_id;
    public $asi_programador;
    public $asi_aplicacion;
    public $asi_situacion;

    public function __construct($args = [])
    {
        $this->asi_id = $args['asi_id'] ?? null;
        $this->asi_programador = $args['asi_programador'] ?? '';
        $this->asi_aplicacion = $args['asi_aplicacion'] ?? '';
        $this->asi_situacion = $args['asi_situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO asignacion (asi_programador, asi_aplicacion, asi_situacion) 
                VALUES ('$this->asi_programador', '$this->asi_aplicacion', '$this->asi_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }


    public function buscarnom()
    {
        $sql = "SELECT gra_nombre || ' de ' || arma_descripcion || ' ' || pro_nombre || ' ' || pro_apellido AS nombre, apl_nombre, asi_id, apl_id, pro_id
                FROM asignacion 
                INNER JOIN programador ON pro_id = asi_programador
                INNER JOIN aplicacion ON apl_id = asi_aplicacion 
                INNER JOIN grados ON gra_id = pro_grado
                INNER JOIN armas ON pro_arma = arma_id";
    
        $conditions = [];
    
        if ($this->asi_id !== null) {
            $conditions[] = "asi_id = $this->asi_id";
        }
    
        if ($this->asi_aplicacion !== false && $this->asi_aplicacion !== '') {
            $conditions[] = "asi_aplicacion = $this->asi_aplicacion";
        }
    
        if ($this->asi_programador !== false && $this->asi_programador !== '') {
            $conditions[] = "asi_programador = $this->asi_programador";
        }
    
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
    
       
        
    
      
        $resultado = self::servir($sql);
    
        return $resultado;
    }
    




    public function buscar()
    {
        $sql = "SELECT asi_id, asi_programador, asi_aplicacion, asi_situacion FROM asignacion";

        if ($this->asi_id != null) {
            $sql .= " WHERE asi_id = $this->asi_id";
        }

        if ($this->asi_programador != '') {
            $sql .= " AND asi_programador LIKE '%$this->asi_programador%'";
        }

        if ($this->asi_aplicacion != '') {
            $sql .= " AND asi_aplicacion LIKE '%$this->asi_aplicacion%'";
        }

        if ($this->asi_situacion != '') {
            $sql .= " AND asi_situacion = '$this->asi_situacion'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE asignacion
                SET asi_programador = '$this->asi_programador', asi_aplicacion = '$this->asi_aplicacion' 
                WHERE asi_id = $this->asi_id";
     

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "DELETE FROM asignacion WHERE asi_id = $this->asi_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
