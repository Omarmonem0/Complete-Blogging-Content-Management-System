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
        //
        $user = App\User::create([
           'name'=>'Omar',
           'email'=>'Omarmonem0@gmail.com',
           'password'=>bcrypt("5260069"),
            'admin'=>1
        ]);
        App\Profile::create([
           'user_id'=>$user->id,
           'facebook'=>"Facebook link",
           "youtube"=>"Youtube link",
           "about" => "Dummy text",
            "avatar" => "/uploads/avatars/Tom-Hardy-net-film-is-about-Bosnian-War-heroin-addiction-834610.jpg"
        ]);
    }
}
