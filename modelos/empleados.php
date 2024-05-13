<?php
require_once __DIR__ . '/bd.php';

class empleado
{
    public $idEmpleado;
    public $nombre;
    public $apellido;
    public $edad;
    public $salario;
    public $id_Cargo;
    public $dni;

    public static function listadoempleados($pag)
    {
        $tamPagina = TAM_PAGINA;
        $offset = ($pag - 1) * $tamPagina;
        $bd = abrirBD();
        $st = $bd->prepare("SELECT *
        FROM empleados e
        INNER JOIN cargo c ON e.id_Cargo = c.id_Cargo  order by nombre desc Limit ?,?");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param('ii', $offset, $tamPagina);
        $ok = $st->execute();
        if ($ok === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }

        $res = $st->get_result();

        $empleados = [];
        while ($empleado = $res->fetch_assoc()) {
            $empleados[] = $empleado;
        }
        $res->free();
        $st->close();
        $bd->close();
        return $empleados;

    }

    public static function cuenta()
    {
        $bd = abrirBD();
        $st = $bd->prepare("SELECT count(*) as num
        FROM empleados");


        if ($st === FALSE) {
            die("ERROR: " . $bd->error);
        }

        $ok = $st->execute();
        if ($ok === FALSE) {
            die("ERROR: " . $bd->error);
        }

        $res = $st->get_result();
        // me guardo los datos en un array associativo
        $datos = $res->fetch_assoc();

        $res->free();
        $st->close();
        $bd->close();
        return $datos['num'];
    }
    public function insertar()
    {
        $bd = abrirBD();
        $st = $bd->prepare("INSERT INTO empleados
                (nombre,apellido,edad,salario,dni,id_Cargo) 
                VALUES (?,?,?,?,?,?)");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param(
            "ssidsi",
            $this->nombre,
            $this->apellido,
            $this -> edad,
            $this-> salario,
            $this -> dni,
            $this -> id_Cargo
        );
        $res = $st->execute();
        if ($res === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $this->idEmpleado = $bd->insert_id;

        $st->close();
        $bd->close();
    }

    public function guardarEmpleado()
    {
        if ($this->idEmpleado) {
            $this->ActualizarEmpleado();
        } else {
            $this->insertar();
        }
    }

    public static function comprobardni($dni)
    {
        $bd = abrirBD();
        $st = $bd->prepare("SELECT * FROM empleados
                WHERE dni=?");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param("s", $dni);
        $ok = $st->execute();
        if ($ok === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $res = $st->get_result();
        $usuario = $res->fetch_object('empleado');
        $res->free();
        $st->close();
        $bd->close();
        return $usuario;
    }

    public function ActualizarEmpleado(){
        $bd = abrirBD();
        $st = $bd->prepare("UPDATE empleados SET
                nombre=?, apellido=?, edad=?, salario=?, dni=? ,id_Cargo=?
                WHERE idEmpleado=?");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param(
            "sssdsii",
            $this->nombre,
            $this->apellido,
            $this->edad,
            $this->salario,
            $this -> dni,
            $this -> id_Cargo,
            $this -> idEmpleado
        );
        $res = $st->execute();
        if ($res === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }

        $st->close();
        $bd->close();
    }



    public static function cargaEmpleado($dni)
    {
        $bd = abrirBD();
        $st = $bd->prepare("SELECT * FROM empleados
                WHERE dni=?");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param("s", $dni);
        $ok = $st->execute();
        if ($ok === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $res = $st->get_result();
        $empleado = $res->fetch_object('empleado');
        $res->free();
        $st->close();
        $bd->close();
        return $empleado ;
    }
}