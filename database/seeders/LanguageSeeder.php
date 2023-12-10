<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->insert([
            ['name' => 'Английский'],
            ['name' => 'Французский'],
            ['name' => 'Немецкий'],
            ['name' => 'Китайский'],
        ]);
    }
}
