<?php

use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('roles')->insert([

            ['name' => 'Super Admine', 'key_name' => 'super_admine'],
            ['name' => 'Admine', 'key_name' => 'admine'],
            ['name' => 'Vendors', 'key_name' => 'vendors'],
            ['name' => 'Customers', 'key_name' => 'customers'],

        ]);


        DB::table('users')->insert([
            [
                'status' => 'active',
                'email' => 'admin@pizza.com',
                'password' => bcrypt('password'),
                'phone' => 9023684190,
                'verified' => 'yes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'status' => 'active',
                'email' => 'super@pizza.com',
                'password' => bcrypt('password'),
                'phone' => 9041804769,
                'verified' => 'yes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'status' => 'active',
                'email' => 'master@pizza.com',
                'password' => bcrypt('password'),
                'phone' => 9041804770,
                'verified' => 'yes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'status' => 'active',
                'email' => 'manager@pizza.com',
                'password' => bcrypt('password'),
                'phone' => 9041804771,
                'verified' => 'yes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'status' => 'active',
                'email' => 'vendor@pizza.com',
                'password' => bcrypt('password'),
                'phone' => 9041804772,
                'verified' => 'yes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'status' => 'active',
                'email' => 'customer@pizza.com',
                'password' => bcrypt('password'),
                'phone' => 9041804773,
                'verified' => 'yes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);

        DB::table('user_roles')->insert([

            ['role_id' => 11, 'user_id' => 1],
            ['role_id' => 11, 'user_id' => 2],
            ['role_id' => 11, 'user_id' => 3],
            ['role_id' => 12, 'user_id' => 4],
            ['role_id' => 13, 'user_id' => 5],
            ['role_id' => 14, 'user_id' => 6],
        ]);
    }
}
