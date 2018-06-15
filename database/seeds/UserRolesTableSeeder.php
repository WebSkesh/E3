<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'id' => 1,
                'name' => 'SuperAdmin'
            ],
            [
                'id' => 2,
                'name' => 'Admin'
            ],
            [
                'id' => 3,
                'name' => 'User'
            ],
            [
                'id' => 4,
                'name' => 'Chief'
            ]
        ]);
    }
}
