<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Product;
use Database\Seeders\UserSeed;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeed;
use Database\Seeders\CategorySeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeed::class,
            CategorySeed::class,
            ProductSeed::class
        ]);

        User::factory(20)->create();
        Product::factory(6)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
