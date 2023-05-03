<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'region_id', 'price_purchase', 'price_selling', 'price_discount'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function regions()
    {
        return $this->hasMany(Region::class, 'id', 'region_id');
    }
}
