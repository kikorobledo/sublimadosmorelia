<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\URL;
use App\Notifications\UserInvitationNotification;

class Users extends Component
{

    use WithPagination;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;

    public $user_id;
    public $cellphone;
    public $facebook;
    public $name;
    public $email;
    public $status;
    public $role;

    protected $queryString = ['search'];

    protected function rules(){
        return[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $this->user_id,
            'status' => 'required|in:activo,inactivo',
            'role' => 'required'
        ];
    }

    protected $validationAttributes = [
        'name' => 'Nombre'
    ];

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
        $this->reset('user_id','name','email','status','role','cellphone', 'facebook');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($user){

        $this->resetAll();

        $this->create = false;

        $this->user_id = $user['id'];
        $this->name = $user['name'];
        $this->cellphone = $user['cellphone'];
        $this->facebook = $user['facebook'];
        $this->email = $user['email'];
        $this->status = $user['status'];
        $this->role = $user['role'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($user){

        $this->modalDelete = true;
        $this->user_id = $user['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'cellphone' => $this->cellphone,
                'facebook' => $this->facebook,
                'status' =>  $this->status,
                'role' => $this->role,
                'password' => 'password',
                'created_by' => auth()->user()->id,
            ]);

            $url = URL::signedRoute('invitation', $user);

            $user->notify(new UserInvitationNotification($url));

            $this->dispatchBrowserEvent('showMessage',['success', "El usuario ha sido creado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {

            dd($th);
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

        try {

            $user = User::findorFail($this->user_id);

            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'cellphone' => $this->cellphone,
                'facebook' => $this->facebook,
                'status' => $this->status,
                'role' => $this->role,
                'updated_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El usuario ha sido actualizado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $user = User::findorFail($this->user_id);

            $user->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El usuario ha sido eliminado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $users = User::with('createdBy','updatedBy')
                        ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orwhere('cellphone', 'LIKE', '%' . $this->search . '%')
                        ->orwhere('facebook', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('role', 'LIKE', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->pagination);

        return view('livewire.admin.users', compact('users'))->layout('layouts.admin');
    }
}
