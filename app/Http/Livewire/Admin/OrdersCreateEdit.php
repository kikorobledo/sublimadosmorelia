<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Design;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderDetail;
use Livewire\WithPagination;

class OrdersCreateEdit extends Component
{

    use WithPagination;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $order;
    public $order_id;
    public $client_id;
    public $anticipo;
    public $status;
    public $total;
    public $image;
    public $description;
    public $content = [];
    public $producto;

    protected $listeners = ['addProduct'];

    protected function rules(){
        return[
            'client_id' => 'required',
            'anticipo' => 'numeric',
            'total' => 'numeric',
            'image' => 'image',
            'status' => 'required',
            'content' => 'required',
        ];
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function addProduct($object){

        $this->validate([
            'client_id' => 'required',
            'status' => 'required',
        ]);

        $this->producto = json_decode($object['product']);

        if(!$this->order){

            $number = Order::orderBy('number', 'desc')->value('number');

            $this->order = Order::create([
                'number' => $number ? $number + 1 : 1,
                'client_id' => $this->client_id,
                'status' => $this->status,
                'total' => (float)$object['quantity'] * (float)$this->producto->price,
                'created_by' => auth()->user()->id,
            ]);

        }

        $aux = OrderDetail::where('order_id', $this->order->id)->where('product_id', $this->producto->id)->where('design_id', (int)$object['design_id'])->first();

        if($aux){

            $aux->quantity = $aux->quantity + (float)$object['quantity'];
            $aux->save();

            $this->total = $this->total + $aux->total;

        }else{

            $orderDetail = OrderDetail::Create([
                'product_id' => $this->producto->id,
                'design_id' => (int)$object['design_id'],
                'quantity' => (float)$object['quantity'],
                'order_id' => $this->order->id,
                'total' => (float)$object['quantity'] * (float)$this->producto->price
            ]);

            $this->total = $this->total + $orderDetail->total;

        }

        $this->producto = null;

        $this->order->refresh();
    }

    public function deleOrderDetail($id){

        try {

            $orderDetail = OrderDetail::Find($id);

            $orderDetail->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El producto ha sido eliminado con exito."]);

            $this->total = $this->total - $orderDetail->total;

            $this->order->refresh();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

        }
    }

    public function create(){

        try {

            foreach ($this->order->orderdetails as  $orderDetail) {

                $this->content[] = array(
                    'product' => $orderDetail->product->name,
                    'design' => $orderDetail->design->name,
                    'price' => $orderDetail->product->price,
                    'quantity' => $orderDetail->quantity,
                    'total' => $orderDetail->total
                );

            }

            $this->order->update([
                'client_id' => $this->client_id,
                'status' => $this->status,
                'anticipo' => $this->anticipo,
                'total' => (float)$this->total,
                'content' => json_encode($this->content, JSON_FORCE_OBJECT),
                'image' => $this->image,
                'description' => $this->description,
                'updated_by' => auth()->user()->id
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El pedido ha sido creado con exito."]);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo."]);
        }
    }

    public function mount(){

        if($this->order){
            $this->client_id = $this->order->client_id;
            $this->status = $this->order->status;
            $this->anticipo = $this->order->anticipo;
            $this->total = $this->order->total;
            $this->description = $this->order->description;
            $this->image = $this->order->image;
        }
    }

    public function render()
    {
        $clients = User::where('role', 'usuario')->get();

        $products = Product::orderBy('name')->get();

        $designs = Design::where('name', 'LIKE', '%' . $this->search . '%')
                            ->simplePaginate(10);

        return view('livewire.admin.orders-create-edit', compact('clients', 'designs', 'products'));
    }
}
