<?php

namespace App\Http\Controllers\Chart;

use App\Models\GuestStar;
use App\Models\Pre_Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Service
{
  public function storePreOrder($event_id, $user_id)
  {
      $data = [
          'event_id' => (int)$event_id,
          'user_id' => (int)$user_id,
          'status' => 'pending'

      ];

      $pre_order = Pre_Order::create($data);

      return $pre_order;
  }

  public function getPreOrderByUserId($user_id)
  {
      $pre_order = DB::table('pre_order')
          ->join('events', 'pre_order.event_id', '=', 'events.id')
          ->select('events.event_name', 'events.location', 'events.date', 'events.time', 'events.price', 'events.capacity', 'events.id', 'pre_order.id as pre_order_id', 'pre_order.status')
          ->where('pre_order.user_id', '=', $user_id)
          ->get();
      return $pre_order;
  }

  public function deletePreOrder($id)
  {
      $pre_order = Pre_Order::find($id);
      $pre_order->delete();
  }
}