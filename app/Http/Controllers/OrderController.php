<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        return view('order');
    }

    public function createOrder(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|',
            'status' => 'required|in:Selesai,Menunggu Pembayaran',
            // 'rekomendasi' => 'required|in:1,0',
            // 'harga' => 'required|numeric|min:0|max:99000000',
        ]);

        Order::create($validateData);

        $request->session()->flash('success', "Sukses menambah menu dengan nama: {$validateData['nama']}");
        return redirect()->route('menus.index');
    }
}
