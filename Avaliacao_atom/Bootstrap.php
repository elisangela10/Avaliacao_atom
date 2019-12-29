<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

use Elisangela\Avaliacao_atom\Framework\Router;

try {
    require __DIR__."/vendor/autoload.php";
    session_start();
    $route = router();
    include __DIR__."/routes/routes.php";
   \Elisangela\Avaliacao_atom\Framework\WebCache::enable(false);
    $conn = \Elisangela\Avaliacao_atom\Framework\Connection::getInstance('database');
    \Elisangela\Avaliacao_atom\Framework\Model::setConnection($conn);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}

