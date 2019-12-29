<?php

namespace Elisangela\Avaliacao_atom\Framework\;

use Elisangela\Avaliacao_atom\Framework\WebCache;

/**
 * ==============================================================================================================
 *
 * View: Classe para gerar as views
 *
 * ----------------------------------------------------
 *
* @author Elisangela Miranda dos Anjos <elisangela.miranda07@bol.com.br>
 * @copyright (c) 2019, Elisangela Miranda dos Anjos
 * @version 1.00
 * ==============================================================================================================
 */
class View
{

    public function render($view_file, $data = [])
    {

        $view_file = str_replace('.', '/', $view_file);
        $filename = '../views/'.$view_file.'.php';
        if (!file_exists($filename)) {
            throw new \Exception("A view não pode ser renderizada. Arquivo <u>{$filename}</u> não encontrado.");
        }
        ob_start();
        /**
         * Gerar variáveis automaticamente
         */
        if (count($data) > 0) {
            foreach ($data as $k => $v) {
                ${$k} = $v;
                
            }
        }
        require_once($filename);
        $contents = ob_get_contents();
        ob_end_clean();
        
        return $contents;
    }
}