<?php

namespace Controllers\Mnt\IntentosPagos;

use Controllers\PublicController;
use Views\Renderer;

class IntentosPagos extends PublicController {


    /* funcion que se encarga de ejecutar el controlador */
    public function run(): void {
    
        $viewData = [];
        $viewData['pagos'] = \Dao\Mnt\IntentosPagos::obtenerTodos();


        Renderer::render('mnt/Pagos', $viewData);
    }
}


?>