<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cupon extends Model
{

    const STATUS = [
        'activo',
        'inactivo'
    ];

    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function order(){
        return $this->belongsToMany(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
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
