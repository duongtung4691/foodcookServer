<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=>"duongtung",
            'contents'=>'duongthanhtung.461991@gmail.com',
            'linking'=>"duongtung",
            'image_thumb'=>'0786783555',
            'idTypes' => 1,
            'idUser' => 1,
        ]);
    }
}
