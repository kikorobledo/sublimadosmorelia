<?php

namespace App\Models;

use App\Models\SubCategoryDesign;
use Illuminate\Database\Eloquent\Model;
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
}
