<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Chart\Service;

class ChartController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index (){
        $user_id = Auth::user()->id;
        $pre_order = $this->service->getPreOrderByUserId($user_id);
        return view('chart', compact('pre_order'));
    }

    public function addKeranjang($id)
    {
        $user_id = Auth::user()->id;
        try {
            $this->service->storePreOrder($id, $user_id);
            return redirect()->route('event', $id)->with('success', 'Berhasil menambahkan ke keranjang');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('event.detail', $id)->with('error', 'Gagal menambahkan ke keranjang');
        }
    }

    public function removeKeranjang($id)
    {
        try {
            $this->service->deletePreOrder($id);
            return redirect()->route('chart')->with('success', 'Berhasil menghapus dari keranjang');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('chart')->with('error', 'Gagal menghapus dari keranjang');
        }
    }
}
