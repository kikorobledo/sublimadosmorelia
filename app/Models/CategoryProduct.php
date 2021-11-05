<?php

namespace App\Models;

use App\Models\Design;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function designs(){
        return $this->hasManyThrough(Design::class, Product::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
