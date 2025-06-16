<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment on these fields
    protected $fillable = [
        'name',
        'category_id',
        'quantity',
        'price',

    ];

    // Cast price to float (number)
    protected $casts = [
        'price' => 'float',
    ];


    // Define relationship: each product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
