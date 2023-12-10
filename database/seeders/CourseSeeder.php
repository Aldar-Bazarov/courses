<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'Введение в английский',
                'description' => 'Курс для новичков по основам аглийского.',
                'start_date' => Carbon::create(2023, 1, 1, 12, 0, 0),
                'people_count' => 30,
                'photo' => '61addb8ab5440fa5633c4ce4128cd673_0_500_0.jpg',
                'language_id' => 1,
            ],
            [
                'name' => 'Изучение немецкого языка для начинающих',
                'description' => 'Базовый курс немецкого языка для новичков.',
                'start_date' => Carbon::create(2024, 1, 1, 13, 0, 0),
                'people_count' => 25,
                'photo' => 'language.jpg',
                'language_id' => 3,
            ],
            [
                'name' => 'Изучение китайского языка для начинающих',
                'description' => 'Базовый курс китайского языка для новичков.',
                'start_date' => Carbon::create(2023, 12, 11, 22, 50, 0),
                'people_count' => 1,
                'photo' => '18082014_inyaz2.jpg',
                'language_id' => 4,
            ],
            [
                'name' => 'Изучение английского языка для продвинутых',
                'description' => 'Продвинутый курс английского языка.',
                'start_date' => Carbon::create(2023, 12, 11, 23, 50, 0),
                'people_count' => 25,
                'photo' => '1k.png',
                'language_id' => 1,
            ],
        ]);
    }
}
