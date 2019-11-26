<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  

       DB::table('users')->insert([
            'id' => '1',
            'firstName' => 'Lucas',
            'lastName' => 'Sheridan',
            'email' => 'lsheridan@bsge.org',
            'password' => bcrypt('secret')]);

        DB::table('users')->insert([
            'id' => '2',
            'firstName' => 'student ',
            'lastName' => 'one',
            'email' => 'student1@bsge.org',
            'password' => bcrypt('secret')]);

        DB::table('users')->insert([
            'id' => '3',
            'firstName' => 'student',
            'lastName' => 'two',
            'email' => 'student2@bsge.org',
            'password' => bcrypt('secret')]);

        DB::table('users')->insert([
            'id' => '4',
            'firstName' => 'student',
            'lastName' => 'three',
            'email' => 'student3@bsge.org',
            'password' => bcrypt('secret')]);

    }
}
