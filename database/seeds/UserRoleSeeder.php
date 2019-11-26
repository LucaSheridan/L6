<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          {
          
         // BSGE Teachers
         DB::table('model_has_roles')->insert([
                'role_id' => 2,
                'model_id' => 1,
                'model_type' => 'App\User']);
         
      	  // Student 1
          DB::table('model_has_roles')->insert([
                'role_id' => 1,
                'model_id' => 2,
                'model_type' => 'App\User']);

          // Student 2
          DB::table('model_has_roles')->insert([
                'role_id' => 1,
                'model_id' => 3,
                'model_type' => 'App\User']);

          // Student 3
          DB::table('model_has_roles')->insert([
                'role_id' => 1,
                'model_id' => 4,
                'model_type' => 'App\User']);
        }
    }
}
