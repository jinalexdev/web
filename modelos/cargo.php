<?php
require_once __DIR__ . '/bd.php';

class cargo
{
    public $id_Cargo;
    public $nombre_Cargo;


    public static function listadocargo()
    {
       
        $bd = abrirBD();
        $st = $bd->prepare("SELECT *
        FROM cargo ");
        if ($st === FALSE) {
            die("Error SQL: " . $bd->error);
        }
        
        $ok = $st->execute();
        if ($ok === FALSE) {
            die("Error de ejecución: " . $bd->error);
        }

        $res = $st->get_result();

        $cargos = [];
        while ($cargo = $res->fetch_assoc()) {
            $cargos[] = $cargo;
        }
        $res->free();
        $st->close();
        $bd->close();
        return $cargos;

    }

}