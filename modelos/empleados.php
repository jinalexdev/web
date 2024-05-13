<?php
require_once __DIR__ . '/bd.php';

class empleado
{
    public $idEmpleado;
    public $nombre;
    public $apellido;
    public $edad;
    public $salario;
    public $cargo;
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
}