<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class PeoplesTableSeeder
 */
class PeoplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('peoples')->insert([ 'first_name' => 'Mauricio', 'last_name' => 'Morales', 'email' => 'mhmorales@mailinator.com', 'created_at' => $now ]);
    }
}
