<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'number_id' => '1023302510',
            'name' => 'Santiago ',
            'last_name' => 'Carreño',
            'email' => 'santiagoestebancmc@gmail.com',
            'password' => bcrypt(123456789),
        ]);
    }
}
