<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class StudentsTableSeeder
 */
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mhmorales_people = DB::table('peoples')->where('email', 'mhmorales@mailinator.com')->first();
        $english1_course = DB::table('courses')->where('name', 'English 1')->first();

        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('students')->insert([ 'people_id' => $mhmorales_people->id, 'course_id' => $english1_course->id, 'created_at' => $now  ]);
    }
}
