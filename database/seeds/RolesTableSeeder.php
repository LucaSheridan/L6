<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      DB::table('roles')->insert([
            'id' => 1,
            'name' => 'student',
            'guard_name' => 'web']);

      DB::table('roles')->insert([
            'id' => 2,
            'name' => 'teacher',
       		'guard_name' => 'web']);
    
      DB::table('roles')->insert([
            'id' => 3,
            'name' => 'admin',
            'guard_name' => 'web']);

      DB::table('roles')->insert([
            'id' => 4,
            'name' => 'master',
            'guard_name' => 'web']);

    }
}
