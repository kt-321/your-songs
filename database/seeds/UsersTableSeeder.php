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
        for($i = 1; $i <= 30; $i++){
            DB::table("users")->insert([
                "name" => "test user". $i,
                "email" => "$i". "@gmail.com",
                "password" =>$i.$i.$i.$i.$i.$i,
                "age" => ($i % 7 +1)*10,
                "gender" =>($i % 2) + 1 ,
            ]);
        }
    }
}
