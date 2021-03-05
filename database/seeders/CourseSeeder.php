<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            ['Course_name'=>'Abacus'],
            ['Course_name'=>'Vedic Maths'],
            ['Course_name'=>'Python'],
            ['Course_name'=>'Unplug'],
            ['Course_name'=>'English Club'],
        ]);
    }
}
