<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cupon;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CuponAdmin extends Component
{

    use WithPagination;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination=10;

    public $cupon_id;
    public $code;
    public $status;
    public $percentage;
    public $available;
    public $min_quantity;
    public $price;
    public $product_id;

    protected function rules(){
        return[
            'code' => 'required',
            'available' => 'required|numeric',
            'min_quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'product_id' => 'required',
            'status' => 'required|in:activa,inactiva',
        ];
    }

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
        $this->reset('code','available','min_quantity','price','product_id','status','percentage');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($cupon){

        $this->resetAll();

        $this->create = false;

        $this->cupon_id = $cupon['id'];
        $this->code = $cupon['code'];
        $this->available = $cupon['available'];
        $this->percentage = $cupon['percentage'];
        $this->min_quantity = $cupon['min_quantity'];
        $this->price = $cupon['price'];
        $this->product_id = $cupon['product_id'];
        $this->status = $cupon['status'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($cupon){

        $this->modalDelete = true;
        $this->cupon_id = $cupon['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            Cupon::create([
                'code' => $this->code,
                'available' => $this->available,
                'percentage' => $this->percentage,
                'min_quantity' => $this->min_quantity,
                'price' => $this->price,
                'product_id' =>  $this->product_id,
                'status' => $this->status,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El cupón ha sido creado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

        try {

            $cupon = Cupon::findorFail($this->cupon_id);

            $cupon->update([
                'code' => $this->code,
                'available' => $this->available,
                'percentage' => $this->percentage,
                'min_quantity' => $this->min_quantity,
                'price' => $this->price,
                'product_id' =>  $this->product_id,
                'status' => $this->status,
                'updated_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El cupón ha sido actualizado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $cupon = Cupon::findorFail($this->cupon_id);

            $cupon->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El cupón ha sido eliminado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $products = Product::all();

        $cupons = Cupon::with('product','createdBy', 'updatedBy')
                            ->where('code', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('status', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('min_quantity', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('available', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('percentage', 'LIKE', '%' . $this->search . '%')
                            ->orWhere(function($q){
                                return $q->whereHas('product', function($q){
                                    return $q->where('name', 'LIKE', '%' . $this->search . '%');
                                });
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->pagination);

        return view('livewire.admin.cupon-admin', compact('cupons', 'products'))->layout('layouts.admin');
    }
}
