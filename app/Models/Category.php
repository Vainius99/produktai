<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    use Sortable;

    protected $fillable = ['title', 'description', 'shop_id'];

    public $sortable = ['id', 'title', 'description', "shopt_id"];

    public function categoryShop() {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
