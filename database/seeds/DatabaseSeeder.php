<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			SitesTableSeeder::class,
			UsersTableSeeder::class,
			UserSiteSeeder::class,
			RolesTableSeeder::class,
			UserRoleSeeder::class,
            CoursesTableSeeder::class,
            SectionsTableSeeder::class,
            	//ArtifactsTableSeeder::class,
            CollectionsTableSeeder::class,
            //PostsTablesSeeder::class,
            //AssignmentsTableSeeder::class,
            	//ComponentsTableSeeder::class

		]);
    }
}
