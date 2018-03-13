<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/13/2018
 * Time: 8:42 AM
 */

namespace App\Scheduler;


use Carbon\Carbon;

class Kernel
{
    protected $events = [];

    protected $date;

    public function getEvents()
    {
        return $this->events;
    }

    public function add(Event $event)
    {
        $this->events[] = $event;

        return $event;
    }

    public function run()
    {
        foreach ($this->getEvents() as $event) {
            if (!$event->isDueToRun($this->getDate())) {
                continue;
            }
            $event->handle();
        }
    }

    public function setDate(Carbon $date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        if (!$this->date) {
            return Carbon::now();
        }

        return $this->date;
    }
}