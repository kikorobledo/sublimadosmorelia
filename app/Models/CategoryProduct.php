<?php

namespace App\Models;

use Carbon\Carbon;
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
