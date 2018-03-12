<?php

use App\Controllers\ReminderController;

$app->get('/', ReminderController::class . ':index');
