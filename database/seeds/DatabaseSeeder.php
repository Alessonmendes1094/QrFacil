<?php

use Illuminate\Database\Seeder;
use App\User;

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
        User::create(array('id'=> '1' ,'name' => 'Usuario Master' , 'email' => 'cotacao@compassti.com.br' , 'password' => bcrypt('#Suporterp123'),));      
    }
}
