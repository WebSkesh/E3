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
        DB::table('user_roles')->insert([
            [
                'id' => 1,
                'name' => 'superAdmin'
            ],
            [
                'id' => 2,
                'name' => 'admin'
            ],
            [
                'id' => 3,
                'name' => 'user'
            ],
            [
                'id' => 4,
                'name' => 'chief'
            ]
        ]);

        /*
        DB::table('customers')->insert([
            [
                'id' => 1,
                'name' => 'empty',
                'number_of_objects' => 0,
                'paid_all' => 0,
                'password' => Hash::make('101010'),
                'started_at' => date('Y-m-d'),
                'paid_to' => date('Y-m-d'),
            ]
        ]);

        DB::table('cities')->insert([
            [
                'id' => 1,
                'name' => 'empty',
                'customer_id' => 1,
                'password' => Hash::make('101010'),
            ]
        ]);

        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'empty',
                'customer_id' => 1,
            ]
        ]);
        */
    }
}
