<?php

namespace App\Models;

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

    protected $guarded = ['id', 'created_at', 'updated_at'];

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
        return $this->belongsToMany(Size::class);
    }

    public function designs(){
        return $this->hasMany(Design::class);
    }
}
