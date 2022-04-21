<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Videos extends Component
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

    public $video_id;
    public $name;
    public $url;
    protected function rules(){
        return[
            'name' => 'required',
            'url' => 'required',
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
        $this->reset('video_id', 'name', 'url');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($video){

        $this->resetAll();

        $this->create = false;

        $this->video_id = $video['id'];
        $this->name = $video['name'];
        $this->url = $video['url'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($video){

        $this->modalDelete = true;
        $this->video_id = $video['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            Video::create([
                'name' => $this->name,
                'url' => $this->url,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El video ha sido creado con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

        $video = Video::findorFail($this->video_id);

            $video->update([
                'name' => $this->name,
                'url' => $this->url,
                'updated_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El video ha sido actualizado con exito."]);

            $this->closeModal();

            $this->updateCache();

        try {



        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $video = Video::findorFail($this->video_id);

            $video->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El video ha sido eliminado con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function updateCache(){
        cache()->put('videos', Video::all());
    }

    public function render()
    {

        $videos = Video::with('createdBy', 'updatedBy')
                        ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('url', 'LIKE', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->pagination);

        return view('livewire.admin.videos', compact('videos'))->layout('layouts.admin');
    }
}
