<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['id'];

    public function productPrice()
    {
        return $this->belongsTo(ProductPrice::class, 'region_id', 'id');
    }
}
