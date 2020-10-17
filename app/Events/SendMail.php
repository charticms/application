<?php

namespace App\Events;

use Charti\Core\Event\Base;

class SendMail extends Base
{
    /**
     * This method will be triggered
     * when you called it through event() method.
     *
     * @return mixed
     */
    public function handle()
    {
        return true;
    }
}
