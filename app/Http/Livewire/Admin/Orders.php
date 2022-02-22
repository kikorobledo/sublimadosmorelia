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
    public $client;
    public $anticipo;
    public $status;
    public $total;
    public $image;
    public $description;
    public $content = [];

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
        $this->reset('order_id','client','anticipo','status','total','image','description','content');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($order){

        $this->resetAll();

        $this->create = false;

        $this->order_id = $order['id'];
        $this->client = $order['client'];
        $this->anticipo = $order['anticipo'];
        $this->total = $order['total'];
        $this->image = $order['image'];
        $this->description = $order['description'];
        $this->content = $order['content'];

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

    public function update(){

        $this->validate();

        try {

            $order = Order::findorFail($this->order_id);

            $order->update([
                'client' => $this->client,
                'anticipo' => $this->anticipo,
                'total' => $this->total,
                'description' => 'description',
                'content' => $this->conten,
                'updated_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El pedido ha sido actualizado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

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
