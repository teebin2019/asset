<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EventModel;

class FullCalendar extends Controller
{

    /**
     * Write code on Method
     *
     */
    public function index()
    {

        $eventModel = new EventModel();
        $events = $eventModel->findAll();
        // print_r($events);
        // die;

        return view('calendar', ['events' => $events]);

    }
}
