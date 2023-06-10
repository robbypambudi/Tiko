<?php

namespace App\Http\Controllers\Event;

use App\Models\GuestStar;
use App\Models\Pre_Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Service
{
    public function getUpcomingEvent(Request $request)
    {
        $search = $request->search;
        $upcoming = DB::table('events')
            ->select('event_name', 'location', 'date', 'time', 'description', 'price', 'capacity', 'id')
            ->where('date', '>=', date('Y-m-d'))
            ->where('event_name', 'like', "%$search%")
            ->orderBy('date', 'asc')
            ->get();

        return $upcoming;
    }


    public function getEventById($id)
    {
        $event = DB::table('events')
            ->select('event_name', 'location', 'date', 'time', 'description', 'price', 'capacity', 'id')
            ->where('id', '=', $id)
            ->get()
            ->first();
        
        return $event;
    }

    public function getGuestStarById($id)
    {
        $guest_star = DB::table('guest_star')
            ->select('artists.name', 'performance_time', 'performance_date')
            ->join('artists', 'guest_star.artist_id', '=', 'artists.id')
            ->where('event_id', '=', $id)
            ->get();

        return $guest_star;
    }

    public function getTimelineById($id)
    {
        $timeline = DB::table('detail_event')
            ->select('*')
            ->where('id', '=', $id)
            ->get()
            ->first();

        return $timeline;
    }


    public function getPreOrderByUserId($event_id, $user_id)
    {
        $pre_order = DB::table('pre_order')
            ->select('*')
            ->where('event_id', '=', $event_id)
            ->where('user_id', '=', $user_id)
            ->get()
            ->first();

        return $pre_order ? $pre_order : null;
    }
}