<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    use Sortable;

    protected $fillable = ['title', 'description', 'email', 'phone', 'country'];

    public $sortable = ['id', 'title', 'description', 'email', 'phone', 'country'];
}
