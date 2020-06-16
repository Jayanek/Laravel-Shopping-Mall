<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => NULL,
                'name' => 'John Smith',
                'email' => 'user@webmall.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$p7DeJ6Wd6W4c7Pw/m97hwOICCK.j/NRf2vs2qRiiEsIoZP0NmjVwm',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-04-19 13:09:35',
                'updated_at' => '2020-04-19 13:09:35',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@webmall.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$2jp4pg/VcIyXbyFDY.mOeeU63N0arDOt8.W2r8eKd3Xs9Aqa13SXq',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-05-23 06:50:21',
                'updated_at' => '2020-05-23 06:50:22',
            ),
        ));
        
        
    }
}