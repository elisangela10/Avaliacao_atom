<?php

namespace Elisangela\Avaliacao_atom\Framework\;

use \Closure;

interface iMiddleware
{
    public function handle($object, Closure $next);

}
