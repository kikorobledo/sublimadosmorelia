<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\SubCategoryDesign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Design extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function subCategoryDesign(){
        return $this->belongsTo(SubCategoryDesign::class);
    }

    public function imageUrl(){
        return $this->image
            ? Storage::disk('designs')->url($this->image)
            : Storage::disk('public')->url('img/logo2.png');

    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getCreatedAtAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }
}
