<?php

namespace App\Controllers;

use App\Models\Reminder;
use Cron\CronExpression;
use App\Scheduler\FrequencyBuilder;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class ReminderController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $reminders = Reminder::latest()->get();

        return $this->c->view->render($response, 'reminder/index.twig', [
            'reminders' => $reminders
        ]);
    }

    public function store(Request $request, Response $response, $args)
    {
        $params = (object) $request->getParams();

        $expression = $this->buildCronExpression($params);

        if (CronExpression::isValidExpression($expression)) {
            $this->createReminder($params, $expression);
        }

        return $response->withRedirect($this->c->router->pathFor('reminders.index'));
    }

    public function delete(Request $request, Response $response, $args)
    {
        Reminder::find($args['reminder'])->delete();
        return $response->withRedirect($this->c->router->pathFor('reminders.index'));
    }

    protected function createReminder($params, $expression)
    {
        Reminder::create([
            'body' => $params->body ?: null,
            'frequency' => $params->frequency,
            'day' => $params->day ?: null,
            'date' => $params->date ?: null,
            'time' => $params->time,
            'expression' => $expression,
            'run_once' => isset($params->run_once)
        ]);
    }

    protected function buildCronExpression($params)
    {
        list($hour, $minute) = explode(':', $params->time);

        $builder = new FrequencyBuilder();
        $builder->frequency($params->frequency);
        $builder->day($params->day);
        $builder->date($params->date);
        $builder->time((int) $hour, (int) $minute);

        return $builder->expression();
    }
}
