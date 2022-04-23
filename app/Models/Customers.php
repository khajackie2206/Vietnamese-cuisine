<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'sdt',
    'address',
    'email',
    'note',
    ];
    public function carts(){
        return $this->hasMany(Cart::class, foreignKey:'customer_id',localKey:'id');
    }
}
