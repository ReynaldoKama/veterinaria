<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'name',
        'price',
        'presentation',
        'specifications',
        'description',
        'stock',
        'image_url',
        'admin_id',	
        'category_id',  // Aquí puedes añadir otros campos como 'category_id' si es necesario
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailSales() { 
        return $this->hasMany(Detail_Sale::class); 
    }

}
