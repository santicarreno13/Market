<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->insert([
            'category_id' => '1',
            'title' => 'Iphone 11',
            'image' => '',
            'stock' => '5',
            'description' => 'La pantalla es una de las características más notables del iPhone 11, y es que mantiene el notch ancho y la resolución HD+ con panel IPS LCD. El iPhone 11 viene ya con iOS 13 como sistema operativo preinstalado, con sucesivas actualizaciones mientras dure su ciclo de dos o tres años.',
        ]);
        DB::table('products')->insert([
            'category_id' => '2',
            'title' => 'Cubo Ruby ',
            'image' => '',
            'stock' => '3',
            'description' => 'Cubo ruby de 4x4',
        ]);
        DB::table('products')->insert([
            'category_id' => '3',
            'title' => 'Mora ',
            'image' => '',
            'stock' => '2',
            'description' => 'Africana',
        ]);
    }
}
