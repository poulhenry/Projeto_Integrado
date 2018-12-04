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
        // $this->call(UsersTableSeeder::class);
        $user = new \App\Admin();
        $user->nome = "Isaac Ferreira";
        $user->usuario = "isaac";
        $user->email = "isaac@stiffcode.com.br";
        $user->senha = \Illuminate\Support\Facades\Hash::make("bikepark");
        $user->status = 1;
        $user->save();

    }
}
