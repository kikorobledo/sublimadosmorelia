<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SubCategoryDesign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryDesign extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];

    public function subcategories(){
        return $this->hasMany(SubCategoryDesign::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class, SubCategoryDesign::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
