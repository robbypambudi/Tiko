<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Event\Service;

class EventContoller extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $events = $this->service->getUpcomingEvent($request);
        $search = $request->search;
        return view('event', compact('events', 'search'));
    }
}
