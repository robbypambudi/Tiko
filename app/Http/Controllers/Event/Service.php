<?php

namespace App\Http\Controllers\Event;

use App\Models\GuestStar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Service
{
    public function getUpcomingEvent(Request $request)
    {
        $search = $request->search;
        $upcoming = DB::table('events')
            ->select('event_name', 'location', 'date', 'time', 'description', 'price', 'capacity')
            ->where('date', '>=', date('Y-m-d'))
            ->where('event_name', 'like', "%$search%")
            ->orderBy('date', 'asc')
            ->get();

        return $upcoming;
    }
}