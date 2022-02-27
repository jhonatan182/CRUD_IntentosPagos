<?php 

namespace Dao\Mnt;
use Dao\Table;

class Categorias extends Table {

    public static function obtenerTodos() {

        $query = "SELECT * FROM categorias;";

        return self::obtenerRegistros($query, []);

    } 

    public static function obtenerPorCatId($catid) {
        $query = "SELECT * FROM categorias WHERE catid=:catid;";
        return self::obtenerUnRegistro(
            $query,
            array("catid"=>$catid)
        );
    }

    public static function nuevaCategoria($catnom , $catest) {

        $sqlstr = "INSERT INTO categorias(catnom,catest) VALUE (:catnom, :catest);";

        return self::executeNonQuery( $sqlstr , ['catnom' => $catnom , 'catest' => $catest] );
    }

    public static function actualizarCategoria($catnom , $catest , $catid) {

        $sqlstr = "UPDATE categorias set catnom=:catnom, catest=:catest where catid=:catid";

        return self::executeNonQuery(
            $sqlstr,
            array(
                "catnom"=> $catnom,
                "catest"=> $catest,
                "catid"=>$catid
            )
        );
    }

    public static function eliminarCategoria($catid)
    {
        $sqlstr = "DELETE FROM categorias where catid=:catid;";
        return self::executeNonQuery(
            $sqlstr,
            array(
                "catid"=>$catid
            )
        );
    }
}

?>