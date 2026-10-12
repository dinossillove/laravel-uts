<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

protected $fillable = [
    'name', 
    'price' ,
    'stock',
    'description',
    'supplier_id',
    'category_id',
];

public function supplier()
{
    return $this->belongsTo(Supplier::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}

}
