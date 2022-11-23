<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  [
            [
              'name' => 'iqra jabeen',
              'email' => 'iqra.jabeen@nextgeni.com',
              'password' =>  Hash::make('iqra111'),
              'email_verified_at' => now(),
              'role_id' => 1,
            
            ]
         
          ];

          User::insert($user);
    }
}
