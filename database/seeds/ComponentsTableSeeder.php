<?php

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('components')->insert([
             'title' => 'Visual Research',
             'assignment_id' =>'1'             
	         ]);
    }
}
