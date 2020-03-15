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
            'fullname'=> 'Công ty Cổ phần Sông Ba',
            'username'=> 'admin',
            'email'=>'sba2007@songba.vn',
            'role'=>1,
            'password'=>bcrypt('123456'),
            'phone'=>'02363653592',
            'active'=>1
        ]);
    }
}
