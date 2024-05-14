<?php
require_once __DIR__ . '/bd.php';

class socio
{
    public $idsocio;
    public $suscripcion;
    public $descuento;
    public $precio;
    public $idUsuario;
    public $fechaSuscripcion;
    public function insertar()
    {
        $fechaHoy = date("Y-m-d H:i:s");
        $bd = abrirBD();
        $st = $bd->prepare("INSERT INTO socios
                (suscripcion,descuento,precio,idUsuario,fechaSuscripcion) 
                VALUES (?, ?, ?, ?, ?)");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param(
            "sidis",
            $this->suscripcion,
            $this->descuento,
            $this->precio,
            $this -> idUsuario,
            $fechaHoy
        );
        $res = $st->execute();
        if ($res === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $this->idSocio = $bd->insert_id;

        $st->close();
        $bd->close();
    }
    public static function tieneSuscripcion($id){
        $bd = abrirBD();
        $st = $bd->prepare("SELECT * FROM socios
                WHERE idUsuario=?");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param("i", $id);
        $ok = $st->execute();
        if ($ok === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $res = $st->get_result();
        $socio = $res->fetch_object('socio');
        $res->free();
        $st->close();
        $bd->close();
        return $socio;
    }
    public static function datossocios($id){
        $bd = abrirBD();
        $st = $bd->prepare("SELECT * FROM socios where idUsuario=?
                ");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param("i", $id);
        $ok = $st->execute();
        if ($ok === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $res = $st->get_result();
        $socio = $res->fetch_object('socio');
        $res->free();
        $st->close();
        $bd->close();
        return $socio;

    
}
}
?>