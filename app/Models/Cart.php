<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
     'customer_id',
     'product_id',
     'num',
     'price',
    ];
    public function product(){
        return $this->hasOne(Product::class,foreignKey:'id',localKey:'product_id');
    }
}
