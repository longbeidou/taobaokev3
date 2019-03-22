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
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
            'actived'  => 1
        ]);
    }
}
