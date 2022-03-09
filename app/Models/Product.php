<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Size;
use App\Models\Color;
use App\Models\SubCategoryDesign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    const UNPUBLISHED = 1;
    const PUBLISHED = 2;

    protected $guarded = [];

    public function categoryProduct(){
        return $this->belongsTo(CategoryProduct::class);
    }

    public function subCategoryDesign(){
        return $this->belongsTo(SubCategoryDesign::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    public function sizes(){
        return $this->belongsToMany(Size::class)->withPivot(['price']);
    }

    public function designs(){
        return $this->hasMany(Design::class);
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
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
