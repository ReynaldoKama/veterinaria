<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->name = 'Anabólicos';
        $category->save();

        $category = new Category();
        $category->name = 'Antibióticos';
        $category->save();
        
        $category = new Category();
        $category->name = 'Antiinflamatorios';
        $category->save();

        $category = new Category();
        $category->name = 'Antiparasitarios';
        $category->save();

        $category = new Category();
        $category->name = 'Biológicos';
        $category->save();

        $category = new Category();
        $category->name = 'Hormonales';
        $category->save();

        $category = new Category();
        $category->name = 'Vitaminas y minerales';
        $category->save();
    }
}
