<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Images extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination=10;

    public $banner_id;
    public $name;
    public $files = [];
    public $files_edit = [];

    protected function rules(){
        return[
            'name' => 'required',
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
        $this->reset('banner_id', 'name', 'files', 'files_edit');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($banner){

        $this->resetAll();

        $this->create = false;

        $this->banner_id = $banner['id'];
        $this->name = $banner['name'];
        $this->files_edit = $banner['images'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($banner){

        $this->modalDelete = true;
        $this->banner_id = $banner['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            $banner = Banner::create([
                'name' => $this->name,
                'created_by' => auth()->user()->id,
            ]);

            if(isset($this->files)){

                foreach($this->files as $file){

                    $image = $file->store('/', 'images');

                    Image::create([
                        'imageable_id' => $banner->id,
                        'imageable_type' => 'App\Models\Banner',
                        'url' => $image
                    ]);
                }

                $this->dispatchBrowserEvent('removeFiles');
            }

            $this->dispatchBrowserEvent('showMessage',['success', "El banner ha sido creado con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

        try {

            $banner = Banner::findorFail($this->banner_id);

            $banner->update([
                'updated_by' => auth()->user()->id,
            ]);

            if(isset($this->files)){

                foreach($this->files as $file){

                    $image = $file->store('/', 'images');

                    Image::create([
                        'imageable_id' => $banner->id,
                        'imageable_type' => 'App\Models\Banner',
                        'url' => $image
                    ]);
                }

                $this->dispatchBrowserEvent('removeFiles');
            }

            $this->updateCache();

            $this->dispatchBrowserEvent('showMessage',['success', "El banner ha sido actualizado con exito."]);

            $this->closeModal();



        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function deleteImage($id){

        try {

            $image = Image::findorFail($id);

            Storage::disk('images')->delete($image->url);

            $image->delete();

            $banner = Banner::findorFail($this->banner_id);

            $this->files_edit = json_decode(json_encode ( $banner->images ) , true);

            $this->dispatchBrowserEvent('showMessage',['success', "La imágen ha sido eliminada con exito."]);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }


    }

    public function delete(){

        try {

            $banner = Banner::findorFail($this->banner_id);

            foreach($banner->images as $image){

                Storage::disk('images')->delete($image->url);
            }

            $banner->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El banner ha sido eliminado con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function updateCache(){

        if($this->name == 'Principal header Desktop')
            cache()->put('encabezadoDesktop', Banner::where('name', 'Principal header Desktop')->first()->images()->get());
        elseif($this->name == 'Principal header Mobile')
            cache()->put('encabezadoMobile', Banner::where('name', 'Principal header Mobile')->first()->images()->get());
        elseif($this->name == 'Principal banner 1 Desktop')
            cache()->put('banner1Desktop', Banner::where('name', 'Principal banner 1 Desktop')->first()->images()->get());
        elseif($this->name == 'Principal banner 1 Mobile')
            cache()->put('banner1Mobile', Banner::where('name', 'Principal banner 1 Mobile')->first()->images()->get());
        elseif($this->name == 'Principal banner 2 Desktop')
            cache()->put('banner2Desktop', Banner::where('name', 'Principal banner 2 Desktop')->first()->images()->get());
        elseif($this->name == 'Principal banner 2 Mobile')
            cache()->put('banner2Mobile', Banner::where('name', 'Principal banner 2 Mobile')->first()->images()->get());
        elseif($this->name == 'Search Mobile')
            cache()->put('searchMobile', Banner::where('name', 'Search Mobile')->first()->images()->get());
        elseif($this->name == 'Search Desktop')
            cache()->put('searchDesktop', Banner::where('name', 'Search Desktop')->first()->images()->get());
        elseif($this->name == 'Categoría Mobile')
            cache()->put('categoryMobile', Banner::where('name', 'Categoría Mobile')->first()->images()->get());
        elseif($this->name == 'Categoría Desktop')
            cache()->put('categoryDesktop', Banner::where('name', 'Categoría Desktop')->first()->images()->get());
        elseif($this->name == 'Catálogo Mobile')
            cache()->put('catalogoMobile', Banner::where('name', 'Catálogo Mobile')->first()->images()->get());
        elseif($this->name == 'Catálogo Desktop')
            cache()->put('catalogoDesktop', Banner::where('name', 'Catálogo Desktop')->first()->images()->get());

    }

    public function render()
    {

        $banners = Banner::with('createdBy', 'updatedBy', 'images')
                            ->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->pagination);

        return view('livewire.admin.images', compact('banners'))->layout('layouts.admin');
    }
}
