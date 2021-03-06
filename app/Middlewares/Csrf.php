<?php

namespace App\Middlewares;

use Notify;
use Charti\Core\Exception\BadRequestHttpException;
use Charti\Core\Middleware\MiddlewareInterface;

class Csrf implements MiddlewareInterface
{
    /**
     * @return mixed
     */
    public function handle()
    {

        if (!in_array(request()->method(), ['HEAD', 'GET', 'OPTIONS'])) {
            // $token = request()->input('field_' . md5('_token') ) ?: request()->header('X-CSRF-TOKEN');
            $token = request()->input('field_' . md5('_token') );

            if (csrf_check($token) === false) {                
                $redirect = str_replace('/dashboard', 'dashboard', request()->server()['REDIRECT_URL']);
                Notify::error('ERR_BAD_CSRF_TOKEN');
                return response()->redirect($redirect, 302);
                // throw new BadRequestHttpException;
            } else {
                return true;
            }
        }

        return true;
    }
}
