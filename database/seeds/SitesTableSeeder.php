<?php

use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
             'name' => 'The Baccalaureate School of Global Education',
             'nickname' => 'BSGE']);


        DB::table('sites')->insert([
             'name' => 'The Art League of Long Island',
             'nickname' => 'ALLI']);

 
    }

}
