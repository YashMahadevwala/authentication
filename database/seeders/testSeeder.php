<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('test')->insert([
            'email' => Str::random(10) . '@gmail.com',
            'pass' => Str::random(10),
            
        ]);

       
    


    }
}
