<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product();
        $product->name = 'Antidiarreico vallée';
        $product->price = 25.50;
        $product->presentation = 'Caja de 10 cartuchos x 10 dosis';
        $product->specifications = 'Terneros: 3 dosis cada 12 horas. Cada dosis de 3 sachets mezclados en un   litro de agua o leche para tratar 50 kg. de p.v.';
        $product->description = 'Asociación de dos quimioterapéuticos: el Ftalilsulfatiazol, de acción local, y la  Sulfamerazina, de acción sistémica. Actúa sobre la mucosa, sobre las capas  profundas de la pared del intestino y sobre los focos infecciosos  extraintestinales, lo que evita la septicemia. Contiene silicato de aluminio  hidratado y el hidróxido de aluminio, poderosos adsorbentes y protectores  de la mucosa.';
        $product->stock = 10;
        $product->image_url = 'https://www.msd-animal-health.com.pe/wp-content/uploads/sites/48/2020/08/REVALOR-200-A-e1626970710206.png?w=300&h=219&crop=1';
        $product->active = true;
        $product->category_id = 1;
        $product->save();
    }
}
