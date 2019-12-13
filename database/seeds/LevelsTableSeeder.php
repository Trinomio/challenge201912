<?php

use Illuminate\Database\Seeder;

/**
 * Class LevelsTableSeeder
 */
class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([ 'name' => 'Beginner' ]);
        DB::table('levels')->insert([ 'name' => 'Intermediate' ]);
        DB::table('levels')->insert([ 'name' => 'Advanced' ]);
    }
}
