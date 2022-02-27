<?php


namespace Dao\Mnt;
use Dao\Table;


class IntentosPagos extends Table {

    public static function obtenerTodos() {

        $query = "SELECT * FROM intentospagos;";

        return self::obtenerRegistros($query, []);

    } 

    public static function obtenerPorId($id) {
        $query = "SELECT * FROM intentospagos WHERE id=:id;";
        return self::obtenerUnRegistro(
            $query,
            array("id"=>$id)
        );
    }

    public static function nuevoPago($cliente , $monto , $fechaVencimiento, $estado ) {

        $sqlstr = "INSERT INTO intentospagos(cliente,monto,fechaVencimiento,estado) VALUE (:cliente, :monto,:fechaVencimiento,:estado);";

        return self::executeNonQuery( $sqlstr , ['cliente' => $cliente , 'monto' => $monto , 'fechaVencimiento' => $fechaVencimiento , 'estado' => $estado]);
    }

    public static function actualizarPago( $cliente , $monto , $fechaVencimiento, $estado , $id) {

        $sqlstr = "UPDATE intentospagos set cliente=:cliente, monto=:monto ,fechaVencimiento=:fechaVencimiento, estado=:estado   where id=:id";

        return self::executeNonQuery(
            $sqlstr,
            array(
                "cliente"=> $cliente,
                "monto"=> $monto,
                "fechaVencimiento"=>$fechaVencimiento,
                "estado" => $estado,
                "id" => $id
            )
        );
    }

    public static function eliminarPago($id) {
        $sqlstr = "DELETE FROM intentospagos where id=:id;";
        return self::executeNonQuery(
            $sqlstr,
            array(
                "id"=>$id
            )
        );
    }


}

?>