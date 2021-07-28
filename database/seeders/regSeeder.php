<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class regSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 50; $i++) { 
        DB::table('posts')->insert([
            'topic' => Str::random(10),
            'disc' => Str::random(10),
            'cid' => rand(1,10)
        ]);
    }
    }
}
