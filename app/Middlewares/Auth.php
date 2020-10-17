<?php

namespace App\Middlewares;

use Charti\Core\Middleware\MiddlewareInterface;
use Charti\Core\Facades\Auth as AuthGuard;

class Auth implements MiddlewareInterface
{
    /**
     * This method will be triggered
     * when the middleware is called
     *
     * @return mixed
     */
    public function handle() : bool
    {
        if( ! AuthGuard::admin() ) {
            return redirect('dashboard/auth');
        }

        return true;
    }

}
