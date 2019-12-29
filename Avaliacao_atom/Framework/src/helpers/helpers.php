<?php

use Elisangela\Avaliacao_atom\Framework\View;
use Elisangela\Avaliacao_atom\Framework\Router;
use Elisangela\Avaliacao_atom\Framework\Request;
use Elisangela\Avaliacao_atom\Framework\Response;
use Elisangela\Avaliacao_atom\Framework\Flash;
use Elisangela\Avaliacao_atom\Framework\Validate;

/**
 * ==============================================================================================================
 *
 * Helpers: funções auxiliares para construção de aplicativos
 *
 * ----------------------------------------------------
 *
 * @author Elisangela Miranda dos Anjos <elisangela.miranda07@bol.com.br>
 * @copyright (c) 2019, Elisangela Miranda dos Anjos
 * @version 1.00
 * ==============================================================================================================
 */
function view($view_file, $data = [])
{
    $view = new View();

    return $view->render($view_file, $data);
}

function request($key = null)
{
    $request = new Request();

    return !is_null($key) ? $request->get($key) : $request;
}

function dd($data)
{
    var_dump($data);
    die();
}

function route($name)
{
    if (func_num_args() > 1) {
        $args   = func_get_args();
        $name   = array_shift($args);
        $params = $args;
    } else {
        $params = [];
    }
    return router()->name($name, $params);
}

function router($uri = null, $method = 'get')
{
    $router = new Router();
    if ($uri) {
        return $router->find($method, $uri);
    }
    return $router;
}

function response($content = '', $status = 200, $headers = [], $charset = 'UTF-8')
{
    return new Response($content, $status, $headers, $charset);
}

function session()
{
    return new Flash;
}

function validate()
{
    return new Validate;
}

function old($field)
{
    return session()->getOld($field);
}
