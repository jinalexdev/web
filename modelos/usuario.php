<?php
require_once __DIR__ . '/bd.php';

class Usuario
{
    public $idUsuario;
    public $Nombre;
    public $Email;
    public $Contrasena;
    public $Admin;
    public $Saldo;

    public function insertar()
    {
        $bd = abrirBD();
        $st = $bd->prepare("INSERT INTO usuarios
                (Nombre,Email,Contrasena,Saldo,Admin) 
                VALUES (?,?,?,?,?)");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param(
            "sssii",
            $this->Nombre,
            $this->Email,
            $this->Contrasena,
            $this -> Saldo,
            $this-> Admin
        );
        $res = $st->execute();
        if ($res === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $this->idUsuario = $bd->insert_id;

        $st->close();
        $bd->close();
    }

    public static function cargaLogin($Email)
    {
        $bd = abrirBD();
        $st = $bd->prepare("SELECT * FROM usuarios
                WHERE Email=?");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        $st->bind_param("s", $Email);
        $ok = $st->execute();
        if ($ok === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }
        $res = $st->get_result();
        $usuario = $res->fetch_object('Usuario');
        $res->free();
        $st->close();
        $bd->close();
        return $usuario;
    }

    public  function Actualizarusuario()
    {
        $bd = abrirBD();
        $st = $bd->prepare("UPDATE usuarios set nombre=? ,Contrasena=? WHERE idUsuario=?");
        if ($st === FALSE) {
            die($bd->error);
        }
        $st->bind_param("ssi", $this->Nombre,  $this->Contrasena, $this->idUsuario);
        $ok = $st->execute();
        if ($ok === FALSE) {
            die($bd->error);
        }
       
        $st->close();
        $bd->close();
    }
}