<?php

/* coincidir con nombre de la carpeta */
namespace Controllers\Clientes;

use Controllers\PublicController;
use Views\Renderer;

class Clientes extends PublicController {

    public function run(): void {

        $viewData = [];

        $viewData['clientes'] = [
            'Jhonatan',
            'Fabricio',
            'Vargas',
            'Morales'
        ];

        $viewData['titulo'] = 'Manejo de datos';


        Renderer::render('Clientes/Clientes', $viewData);
    }

}


?>