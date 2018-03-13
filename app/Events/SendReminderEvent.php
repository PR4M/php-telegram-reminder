<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/13/2018
 * Time: 3:45 PM
 */

namespace App\Events;

use App\Scheduler\Event;

class SendReminderEvent extends Event
{
    public function handle()
    {
        dump($this->expression);
    }
}