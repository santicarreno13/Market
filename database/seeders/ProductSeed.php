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
            'title' => 'KeyBoard ',
            'image' => '',
            'stock' => '5',
            'description' => 'RedDragon',
        ]);
        DB::table('products')->insert([
            'category_id' => '2',
            'title' => 'Hoy Wheel ',
            'image' => '',
            'stock' => '1',
            'description' => 'Hot Wheel Red',
        ]);
        DB::table('products')->insert([
            'category_id' => '3',
            'title' => 'Sandia ',
            'image' => '',
            'stock' => '2',
            'description' => 'Africana',
        ]);
    }
}
