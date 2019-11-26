<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
             'title' => 'IB ART 11/CD',
         	 'course_id' => 4,
         	 'site_id' => 1,
         	 'is_active' => 1,
             'is_open' => 1,
         	 'registrationCode' => 'art12/CD',         	 
             'year' => '2018-19'            

         	 ]);

         DB::table('sections')->insert([
             'title' => 'IB ART 12/CE',
         	 'course_id' => 5,
         	 'site_id' => 1,
             'is_active' => 1,
             'is_open' => 1,
         	 'registrationCode' => 'art12/CE',
             'year' => '2019-20'            
         	 
         	 ]);

         // Users

          DB::table('section_user')->insert([
             'section_id' => '1',
             'user_id' => '1',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '1',
             'user_id' => '2',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '1',
             'user_id' => '3',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '2',
             'user_id' => '1',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '2',
             'user_id' => '2',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '2',
             'user_id' => '3',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '2',
             'user_id' => '4',
             ]);



       }
}
