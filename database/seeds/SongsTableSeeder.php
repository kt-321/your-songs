<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=60; $i++){
            DB::table("songs")->insert([
                "user_id" => ($i % 30) + 1,
                "song_name" => "song". $i,
                "artist_name" => "artist". $i,
                "music_age" => "1980" + ($i % 4 * 10),
                "description" => "descriptiondescriptiondescriptiondescription". $i,
            ]);
        }
    }
}
