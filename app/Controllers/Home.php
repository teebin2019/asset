<?php

namespace App\Controllers;
use App\Models\EventModel;


class Home extends BaseController
{
    public function index(): string
    {
        $eventModel = new EventModel();
        $events = $eventModel->findAll();
        return view('frontend/home',['events' => $events]);
    }
}
