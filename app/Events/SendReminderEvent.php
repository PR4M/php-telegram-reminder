<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/13/2018
 * Time: 3:45 PM
 */

namespace App\Events;

use GuzzleHttp\Client;
use App\Models\Reminder;
use App\Scheduler\Event;

class SendReminderEvent extends Event
{
    protected $reminder;
    protected $client;
    protected $settings;

    public function __construct(Reminder $reminder, Client $client, $settings)
    {
        $this->reminder = $reminder;
        $this->client = $client;
        $this->settings = $settings;
    }

    public function handle()
    {
        $this->client->request('GET', $this->buildRequestURL());

        if ($this->reminder->run_once) {
            $this->reminder->delete();
        }
    }

    protected function buildRequestURL()
    {
        return "https://api.telegram.org/bot{$this->settings['telegram']['token']}/sendMessage?chat_id={$this->settings['telegram']['chat_id']}&text={$this->reminder->body}";
    }
}