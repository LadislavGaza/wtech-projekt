<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(ShoppingItem::class, 'shopping_cart_id');
    }
}
