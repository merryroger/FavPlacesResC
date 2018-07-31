<?php

use Illuminate\Database\Seeder;

class PlacetypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('placetypes')->insert(['name' => 'cities']);
        DB::table('placetypes')->insert(['name' => 'islands']);
    }
}
