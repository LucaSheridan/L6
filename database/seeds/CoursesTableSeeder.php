<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
             'id' => 1,
             'title' => 'Art 8',
         	 'site_id' => 1,
         	 'is_active' => true,
         	 ]);

        DB::table('courses')->insert([
             'id' => 2,
             'title' => 'Art 9',
         	 'site_id' => 1,
         	 'is_active' => true,
         	 ]);

        DB::table('courses')->insert([
             'id' => 3,
             'title' => 'Art 10',
         	 'site_id' => 1,
         	 'is_active' => true,
         	 ]);

        DB::table('courses')->insert([
             'id' => 4,
             'title' => 'IB Art 11',
         	 'site_id' => 1,
         	 'is_active' => true,
         	 ]);

        DB::table('courses')->insert([
             'id' => 5,
             'title' => 'IB Art 12',
         	 'site_id' => 1,
         	 'is_active' => true,
         	 ]);
    }
}
