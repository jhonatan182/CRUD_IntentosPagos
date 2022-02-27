<?php

namespace Controllers\Mnt\IntentosPagos;

use Controllers\PublicController;
use Views\Renderer;

class Pago extends PublicController {

    private $_modeStrings = [
        'INS' => 'Nueva Categoria',
        'UPD' => 'Editar %s (%s)',
        'DSP' => 'Detalle de %s (%s)',
        'DEL' => 'Eliminando $s (%s)'
    ];

    private $_estadoPagoOptions = [
        "ENV" => "Enviado",
        "PGD" => "Pagado",
        "CNL" => "Cancelado",
        "ERR" => "Error"
    ];

    private $_viewData = [
        "mode"=>"INS",
        "id"=>0,
        "cliente"=>"",
        "monto"=>"ACT",
        "fechaVencimiento"=>"",
        "estado" => "",
        "readonly"=>false,
        "isInsert"=>false,
        "estadoPagoOptions"=>[],
    ];

    private function init(){

        if (isset($_GET["mode"])) {
            $this->_viewData["mode"] = $_GET["mode"];
        }
        if (isset($_GET["id"])) {
            $this->_viewData["id"] = $_GET["id"];
        }
        if (!isset($this->_modeStrings[$this->_viewData["mode"]])) {
            error_log(
                $this->toString() . " Mode not valid " . $this->_viewData["mode"],
                0
            );
            \Utilities\Site::redirectToWithMsg(
                'index.php?page=mnt_intentospagos_intentospagos',
                'Sucedio un error al procesar la página.'
            );
        }
        if ($this->_viewData["mode"] !== "INS" && intval($this->_viewData["id"], 10) !== 0) {
            $this->_viewData["mode"] !== "DSP";
        }
    }

    private function handlePost() {

        \Utilities\ArrUtils::mergeFullArrayTo($_POST, $this->_viewData);
        
        $this->_viewData["id"] = intval($this->_viewData["id"], 10);

        if (!\Utilities\Validators::isMatch( $this->_viewData['estado'] ,"/^(ENV)|(PGD)|(CNL)|(ERR)$/")) {
            $this->_viewData['errors'][] ='Categoria debe ser ENV,PGD,CNL o ERR ';
        }

        if(isset($this->_viewData['errors']) && count($this->_viewData['errors']) > 0 ) {

        } else {

            switch($this->_viewData['mode']) {
                case 'INS':

                    $result = \Dao\Mnt\IntentosPagos::nuevoPago(
                        $this->_viewData["cliente"],
                        $this->_viewData["monto"],
                        $this->_viewData["fechaVencimiento"],
                        $this->_viewData["estado"],
                    );
                    if ($result) {
                        \Utilities\Site::redirectToWithMsg(
                            'index.php?page=mnt_intentospagos_intentospagos',
                            "¡Pago realizado satisfactoriamente!"
                        );
                    }

                    break; 
                
                case 'UPD':

                    $result = \Dao\Mnt\IntentosPagos::actualizarPago(
                        $this->_viewData["cliente"],
                        $this->_viewData["monto"],
                        $this->_viewData["fechaVencimiento"],
                        $this->_viewData["estado"],
                        $this->_viewData["id"]
                    );
                    if ($result) {
                        \Utilities\Site::redirectToWithMsg(
                            'index.php?page=mnt_intentospagos_intentospagos',
                            "¡Pago actualizado satisfactoriamente!"
                        );
                    }
                    break;
                
                case 'DEL':

                    $result = \Dao\Mnt\IntentosPagos::eliminarPago(
                        $this->_viewData["id"]
                    );
                    if ($result) {
                        \Utilities\Site::redirectToWithMsg(
                            'index.php?page=mnt_intentospagos_intentospagos',
                            "¡Pago eliminado satisfactoriamente!"
                        );
                    }
                    break;
                
                default:
                    break;
            }
        }


    }

    private function prepareViewData() {

        if ($this->_viewData["mode"] == "INS") {

            $this->_viewData["modeDsc"]
            = $this->_modeStrings[$this->_viewData["mode"]];
            
        } else {
            $tmpPago = \Dao\Mnt\IntentosPagos::obtenerPorId(
                intval($this->_viewData["id"], 10)
            );
            \Utilities\ArrUtils::mergeFullArrayTo($tmpPago, $this->_viewData);
            
            $this->_viewData["modeDsc"] = sprintf(
                $this->_modeStrings[$this->_viewData["mode"]],
                $this->_viewData["cliente"],
                $this->_viewData["monto"]
            );
        }
        $this->_viewData["_estadoPagoOptions"]
            = \Utilities\ArrUtils::toOptionsArray(
                $this->_estadoPagoOptions,
                'value',
                'text',
                'selected',
                $this->_viewData['estado']
            );
    }

    public function run(): void
    {
        $this->init();
        if ($this->isPostBack()) {
            $this->handlePost();
        }
        $this->prepareViewData();
        Renderer::render('mnt/NuevoPago', $this->_viewData);
    }
}

?>