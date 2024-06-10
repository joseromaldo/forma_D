<?php
require_once 'Conexion.php';

class Tareas extends Conexion {
    public $tar_id;
    public $tar_app;
    public $tar_descripcion;
    public $tar_fecha;
    public $tar_estado;

    public function __construct($args = []) {
        $this->tar_id = $args['tar_id'] ?? null;
        $this->tar_app = $args['tar_app'] ?? '';
        $this->tar_descripcion = $args['tar_descripcion'] ?? '';
        $this->tar_fecha = $args['tar_fecha'] ?? '';
        $this->tar_estado = $args['tar_estado'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO tareas(tar_app, tar_descripcion, tar_fecha, tar_estado) 
                VALUES ('$this->tar_app', '$this->tar_descripcion', '$this->tar_fecha', '$this->tar_estado')";

     
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "select tar_id, apl_nombre, tar_descripcion, tar_fecha from tareas inner join aplicacion on tar_app = apl_id";

        if ($this->tar_id != null) {
            $sql .= " AND tar_id = $this->tar_id";
        }

        if ($this->tar_app != '') {
            $sql .= " AND tar_app LIKE '%$this->tar_app%'";
        }

        if ($this->tar_descripcion != '') {
            $sql .= " AND tar_descripcion LIKE '%$this->tar_descripcion%'";
        }

        if ($this->tar_fecha != '') {
            $sql .= " AND tar_fecha = '$this->tar_fecha'";
        }

        if ($this->tar_estado != '') {
            $sql .= " AND tar_estado = '$this->tar_estado'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    
    public function buscartar() {
     
        if (empty($this->tar_app)) {
            $sql = "SELECT * FROM tareas";
        } else {
            $sql = "SELECT * FROM tareas WHERE tar_app = $this->tar_app";
        }
      
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscartar_id() {
       
        $sql = "select * from tareas  WHERE tar_id = $this->tar_id ";

  
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function modificar() {
        $sql = "UPDATE tareas 
                SET tar_app = '$this->tar_app', tar_descripcion = '$this->tar_descripcion', 
                    tar_fecha = '$this->tar_fecha', tar_estado = '$this->tar_estado' 
                WHERE tar_id = $this->tar_id";
     

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    
    public function cambio() {
        $sql = "UPDATE tareas 
                SET  tar_estado = '$this->tar_estado' 
                WHERE tar_id = $this->tar_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM tareas WHERE tar_id = $this->tar_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
