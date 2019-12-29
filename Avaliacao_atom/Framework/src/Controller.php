<?php

namespace Elisangela\Avaliacao_atom\Framework\;

/**
 * ==============================================================================================================
 *
 * Controller: Classe para criar camada de controle
 *
 * ----------------------------------------------------
 *
 * @author Elisangela Miranda dos Anjos <elisangela.miranda07@bol.com.br>
 * @copyright (c) 2019, Elisangela Miranda dos Anjos
 * @version 1.00
 * ==============================================================================================================
 */
class Controller
{
    protected  $request;
    protected  $model;

    public function __construct($model = null)
    {
        $this->model = $model;
        $this->request = request();
    }

    protected function view($view_file, $data = null)
    {
        $result = view($view_file, $data);
        session()->flush();
        return $result;
    }
}