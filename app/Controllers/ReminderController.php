<?php

namespace App\Controllers;

use App\Models\Reminder;
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
}
