<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class UserOrders extends Component
{

    public $status = [];
    public $filter;

    protected $listeners = ['render'];

    public function mount(){

        $this->status = [
            'nueva' => Order::where('client_id', auth()->user()->id)->where('status', 'nueva')->count(),
            'aceptada' => Order::where('client_id', auth()->user()->id)->where('status', 'aceptada')->count() + Order::where('client_id', auth()->user()->id)->where('status', 'pagada')->count(),
            'terminada' => Order::where('client_id', auth()->user()->id)->where('status', 'terminada')->count(),
            'entregada' => Order::where('client_id', auth()->user()->id)->where('status', 'entregada')->count(),
            'cancelada' => Order::where('client_id', auth()->user()->id)->where('status', 'cancelada')->count(),
        ];

    }

    public function sendWhastapp($order){

        $mensaje = "https://api.whatsapp.com/send?phone=+5214431992866&text=Sublimados%20Morelia.%0ASolicito%20información%20de:%0APedido%3A%20%23" . $order['number'] . "%0ATotal:%20%24" . $order['total'];

        $this->dispatchBrowserEvent('sendWhatsApp',$mensaje);

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
