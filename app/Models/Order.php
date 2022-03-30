<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function cupons(){
        return $this->belongsToMany(Cupon::class);
    }

    public function client(){
        return $this->belongsTo(User::class);
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

    public function anticipoUrl(){
        return $this->anticipo_image
            ? Storage::disk('orders')->url($this->anticipo_image)
            : Storage::disk('public')->url('img/logo2.png');

    }

    public function designUrl(){
        return $this->design_image
            ? Storage::disk('orders')->url($this->design_image)
            : Storage::disk('public')->url('img/logo2.png');

    }
}
