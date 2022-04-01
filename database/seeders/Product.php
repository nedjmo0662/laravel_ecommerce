<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<50; $i++){
        DB::table('products')->insert([
            'title' => Str::random(10),
            'description' => Str::random(10).'@gmail.com',
            'quantity' => 456,
            'price' => 45
        ]);
    }
        //
    }
}
