<?php

use App\Scheduler\Kernel;
use App\Events\SendReminderEvent;

use App\Models\Reminder;

require_once __DIR__ . '/bootstrap/app.php';

$kernel = new Kernel;

Reminder::get()->each(function ($reminder) use ($kernel, $container) {
   $kernel->add(new SendReminderEvent($reminder, $container->guzzle, $container->settings))->cron($reminder->expression);
});

$kernel->run();