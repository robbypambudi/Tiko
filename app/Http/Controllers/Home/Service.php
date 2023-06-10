<?php

namespace App\Http\Controllers\Home;

use App\Models\GuestStar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Service
{
    public function getPopularArtist()
    {
        $popular = DB::table('guest_star')
            ->join('artists', 'guest_star.artist_id', '=', 'artists.id')
            ->select('artists.name', 'artists.artist_id', DB::raw('COUNT(guest_star.artist_id) as total'))
            ->where('guest_star.performance_date', '>=', date('Y-m-d'))
            ->groupBy('artists.name', 'artists.artist_id')
            ->orderByRaw('total DESC')
            ->limit(5)
            ->get();

        $artist_populer = [];

        for ($i = 0; $i < count($popular); $i++) {
            $event = DB::table('guest_star')
                ->join('artists', 'guest_star.artist_id', '=', 'artists.id')
                ->join('events', 'guest_star.event_id', '=', 'events.id')
                ->select('events.event_name', 'events.location', 'events.date', 'events.time', 'events.description', 'events.price', 'events.capacity')
                ->where('artists.id', $popular[$i]->artist_id)
                ->where('events.date', '>=', date('Y-m-d'))
                ->orderBy('events.date', 'asc')
                ->limit(4)
                ->get();

            $artis_populer[$i] = [
                'name' => $popular[$i]->name,
                'artist_id' => $popular[$i]->artist_id,
                'total' => $popular[$i]->total,
                'event' => $event
            ];
        }
        return $artis_populer;
    }

    public function getUpcomingEvent()
    {
        $upcoming = DB::table('events')
            ->select('event_name', 'location', 'date', 'time', 'description', 'price', 'capacity', 'id')
            ->where('date', '>=', date('Y-m-d'))
            ->orderBy('date', 'asc')
            ->limit(5)
            ->get();

        return $upcoming;
    }
}