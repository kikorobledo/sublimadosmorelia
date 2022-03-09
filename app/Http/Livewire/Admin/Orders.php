<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $order_id;
    public $number;
    public $client;
    public $total;
    public $image;
    public $order_content = [];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function order($sort){

        if($this->sort == $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function resetAll(){
        $this->reset('order_id','client','total','image','order_content');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalDetails($order){

        $this->resetAll();

        $this->create = false;

        $this->order_id = $order['id'];
        $this->number = $order['number'];
        $this->status = $order['status'];
        $this->client = $order['client']['name'];
        $this->anticipo_image = $order['anticipo_image'];
        $this->design_image = $order['design_image'];
        $this->total = $order['total'];
        $this->order_content = json_decode($order['content'],true);

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($order){

        $this->modalDelete = true;
        $this->order_id = $order['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function delete(){

        try {

            $order = Order::findorFail($this->order_id);

            $order->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El pedido ha sido eliminado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {
        $orders = Order::with('createdBy', 'updatedBy')->paginate(10);

        return view('livewire.admin.orders', compact('orders'));
    }
}
