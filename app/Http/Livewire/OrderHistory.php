<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Auth;

class OrderHistory extends Component
{
    public function cancelOrder($id)
    {
        $order = OrderModel::where('id', $id)->where('user_id', Auth::id())->first();

        if ($order) {
            $order->delete(); 
            session()->flash('message', 'Pemesanan berhasil dibatalkan.');
        }
    }

    public function render()
    {
        $orders = OrderModel::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.components.OrderHistory', compact('orders'))->layout('layouts.app');
    }
}