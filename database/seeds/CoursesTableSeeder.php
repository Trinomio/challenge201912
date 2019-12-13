<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class CoursesTableSeeder
 */
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beginner_level = DB::table('levels')->where('name', 'Beginner' )->first();
        $intermediate_level = DB::table('levels')->where('name', 'Intermediate' )->first();
        $advanced_level = DB::table('levels')->where('name', 'Advanced' )->first();

        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('courses')->insert([ 'name' => 'English 1', 'language_code' => 'en', 'level_id' => $beginner_level->id, 'created_at' => $now ]);
        DB::table('courses')->insert([ 'name' => 'English 2', 'language_code' => 'en', 'level_id' => $intermediate_level->id, 'created_at' => $now ]);
        DB::table('courses')->insert([ 'name' => 'English 3', 'language_code' => 'en', 'level_id' => $advanced_level->id, 'created_at' => $now ]);
    }
}
