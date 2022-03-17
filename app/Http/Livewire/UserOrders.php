<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class UserOrders extends Component
{

    public $status = [];
    public $filter;

    public function mount(){

        $this->status = [
            'nueva' => Order::where('client_id', auth()->user()->id)->where('status', 'nueva')->count(),
            'aceptada' => Order::where('client_id', auth()->user()->id)->where('status', 'aceptada')->count(),
            'terminada' => Order::where('client_id', auth()->user()->id)->where('status', 'terminada')->count(),
            'entregada' => Order::where('client_id', auth()->user()->id)->where('status', 'entregada')->count(),
            'cancelada' => Order::where('client_id', auth()->user()->id)->where('status', 'cancelada')->count(),
        ];

    }

    public function render()
    {
        $orders = Order::where('client_id', auth()->user()->id)
                            ->when($this->filter, function($q){
                                $q->where('status', $this->filter);
                            })
                            ->orderBy('created_at', 'desc')
                            ->simplePaginate(10);

        return view('livewire.user-orders', compact('orders'));
    }
}
