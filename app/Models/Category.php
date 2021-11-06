<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function categoryShop() {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
