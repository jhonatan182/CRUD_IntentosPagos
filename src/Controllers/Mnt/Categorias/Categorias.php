<?php 

namespace Controllers\Mnt\Categorias;

use Controllers\PublicController;
use Views\Renderer;

class Categorias extends PublicController {



    /* funcion que se encarga de ejecutar el controlador */
    public function run(): void {
        
        $viewData = [];
        $viewData['categorias'] = \Dao\Mnt\Categorias::obtenerTodos();


        Renderer::render('mnt/Categorias', $viewData);
    }

}

?>