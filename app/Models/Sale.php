<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $fillable = [ 
        'sale_date', 
        'cantidad', 
        'user_id', 
        'product_id', 
    ];

    public function detailSales() { 
        return $this->hasMany(Detail_Sale::class); 
    }
}
