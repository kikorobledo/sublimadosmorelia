<?php

namespace App\Models;

use Carbon\Carbon;
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
