<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 3/12/2018
 * Time: 6:49 PM
 */

namespace App\Scheduler;

use Carbon\Carbon;
use Cron\CronExpression;

abstract class Event
{
    use Frequencies;
    /**
     * The cron expression for this event
     *
     * @var string
     */
    public $expression = '* * * * *';

    /**
     * Handle the event
     *
     * @return void
     */
    abstract public function handle();

    /**
     * Check the event when it's needing to run
     *
     * @param Carbon $date
     * @return bool
     */
    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }
}