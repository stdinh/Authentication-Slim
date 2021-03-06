<?php

namespace App\Middleware;

use App\Middleware\Middleware;

class OldInputMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        $this->container->view->getEnvironment()->addGlobal('inputdata', $_SESSION['old']);

        $_SESSION['old'] = $request->getParams();

        $response = $next($request, $response);

        return $response;
    }
}
