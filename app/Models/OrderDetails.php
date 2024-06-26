<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    public function orders(){
        return $this->belongsTo(Order::class, 'product_id');
    }

    public function product (){

        return $this->belongsTo(Product::class, 'product_id');
      }
}
