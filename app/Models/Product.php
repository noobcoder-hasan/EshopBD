<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    // Add fillable property
    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'how_to_use',
        'product_ingredients',
        'product_image',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_product', 'product_id', 'ingredient_id');
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id'); // Ensure the foreign key is 'product_id'
    }

}

