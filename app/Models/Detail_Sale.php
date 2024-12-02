<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Sale extends Model
{
    /** @use HasFactory<\Database\Factories\DetailSaleFactory> */
    use HasFactory;
    protected $fillable = [ 
        'quantity', 
        'price', 
        'sale_id', 
        'product_id', 
    ];
    public function sale() { 
        return $this->belongsTo(Sale::class); 
    } 
    
    public function product() { 
        return $this->belongsTo(Product::class); 
    }
}
