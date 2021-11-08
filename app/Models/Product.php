<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    use Sortable;

    protected $fillable = ['title', 'excertpt', 'description', 'price', 'category_id'];

    public $sortable = ['id', 'title', 'excertpt', 'description', 'price', 'category_id'];

    public function productCategory() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
