<?php
require_once __DIR__ . '/bd.php';

class socio
{
    public $idsocio;
    public $suscripcion;
    public $descuento;
    public $precio;
    public $idUsuario;
 
    public function insertar()
    {
        $bd = abrirBD();
        $st = $bd->prepare("INSERT INTO socios
                (suscripcion,descuento,precio,idUsuario) 
                VALUES (?,?,?,?)");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param(
            "siii",
            $this->suscripcion,
            $this->descuento,
            $this->precio,
            $this -> idUsuario
        );
        $res = $st->execute();
        if ($res === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $this->idSocio = $bd->insert_id;

        $st->close();
        $bd->close();
    }

   
}
?>