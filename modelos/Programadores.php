<?php
require_once 'Conexion.php';

class Programador extends Conexion {
    public $pro_id;
    public $pro_correo;
    public $pro_grado;
    public $pro_arma;
    public $pro_nombre;
    public $pro_apellido;
    public $pro_dpi;
    public $pro_situacion;

    public function __construct($args = []) {
        $this->pro_id = $args['pro_id'] ?? null;
        $this->pro_correo = $args['pro_correo'] ?? '';
        $this->pro_grado = $args['pro_grado'] ?? '';
        $this->pro_arma = $args['pro_arma'] ?? '';
        $this->pro_nombre = $args['pro_nombre'] ?? '';
        $this->pro_apellido = $args['pro_apellido'] ?? '';
        $this->pro_dpi = $args['pro_dpi'] ?? '';
        $this->pro_situacion = $args['pro_situacion'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO programador(pro_grado, pro_arma, pro_nombre, pro_apellido, pro_correo, pro_dpi, pro_situacion) 
                VALUES ('$this->pro_grado', '$this->pro_arma', '$this->pro_nombre', '$this->pro_apellido', '$this->pro_correo','$this->pro_dpi','$this->pro_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "SELECT pro_id, pro_correo,pro_dpi, gra_nombre || ' de ' || arma_descripcion|| ' ' || pro_nombre || ' ' || pro_apellido AS nombre
        FROM programador INNER JOIN grados on gra_id= pro_grado INNER JOIN  armas ON  pro_arma =  arma_id " ;

        if ($this->pro_id != null) {
            $sql .= " AND pro_id = $this->pro_id";
        }

        if ($this->pro_correo != '') {
            $sql .= " AND pro_correo LIKE '%$this->pro_correo%'";
        }

        if ($this->pro_grado != '') {
            $sql .= " AND pro_grado LIKE '%$this->pro_grado%'";
        }

        if ($this->pro_nombre != '') {
            $sql .= " AND pro_nombre LIKE '%$this->pro_nombre%'";
        }

        if ($this->pro_apellido != '') {
            $sql .= " AND pro_apellido LIKE '%$this->pro_apellido%'";
        }

        if ($this->pro_apellido != '') {
            $sql .= " AND pro_dpi LIKE '%$this->pro_dpi%'";
        }

        if ($this->pro_situacion != '') {
            $sql .= " AND pro_situacion = '$this->pro_situacion'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar2() {
        $sql = "SELECT *
        FROM programador INNER JOIN grados on gra_id= pro_grado INNER JOIN  armas ON  pro_arma =  arma_id  ";

        if ($this->pro_id != null) {
            $sql .= " AND pro_id = $this->pro_id";
        }

        if ($this->pro_correo != '') {
            $sql .= " AND pro_correo LIKE '%$this->pro_correo%'";
        }

        if ($this->pro_arma != '') {
            $sql .= " AND pro_arma LIKE '%$this->pro_arma%'";
        }
           if ($this->pro_grado != '') {
            $sql .= " AND pro_grado LIKE '%$this->pro_grado%'";
        }

        if ($this->pro_nombre != '') {
            $sql .= " AND pro_nombre LIKE '%$this->pro_nombre%'";
        }

        if ($this->pro_apellido != '') {
            $sql .= " AND pro_apellido LIKE '%$this->pro_apellido%'";
        }

        if ($this->pro_apellido != '') {
            $sql .= " AND pro_dpi LIKE '%$this->pro_dpi%'";
        }

        if ($this->pro_situacion != '') {
            $sql .= " AND pro_situacion = '$this->pro_situacion'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function modificar() {
        $sql = "UPDATE programador 
                SET pro_correo = '$this->pro_correo', pro_grado = '$this->pro_grado', 
                    pro_nombre = '$this->pro_nombre', pro_apellido = '$this->pro_apellido', 
                    pro_dpi = '$this->pro_dpi', pro_situacion = '$this->pro_situacion' 
                WHERE pro_id = $this->pro_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM programador WHERE pro_id = $this->pro_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
