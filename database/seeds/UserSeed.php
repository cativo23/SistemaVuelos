<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'cativo23.kt@gmail.com',
            'password' => Hash::make('cativo23')
        ]);
        $user->assign('super');

        $user->markEmailAsVerified();

        $banned_user = User::create([
            'name' => 'Banned',
            'email' => 'activo23.kt@gmail.com',
            'password'=> Hash::make('cativo23')
        ]);

        $banned_user->markEmailAsVerified();

        $test_user = User::create([
            'name' => 'bad115',
            'username'=>'bad115',
            'email' => 'sh14020@ues.edu.sv',
            'password'=> Hash::make('bad115gt01')
        ]);

        $test_user->markEmailAsVerified();

        $banned_user->ban([
            'expired_at' => '+1 month',
            'comment'=> 'Prueba de ban'
        ]);
    }
}
