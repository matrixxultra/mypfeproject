<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("filieres")->insert([
            "name"=>"Developpement Digital",
        ]);
        DB::table("groupes")->insert([
            "name"=>"DEVOWFS201",
            "filiere_id"=>1
        ]);
        DB::table("admins")->insert([
            "name"=>"AGHBALOU",
            "prenom"=>"IDRISS",
            "email"=>"idriss@gmail.com",
            "phone_number"=>"06000000",
            "Cin"=>"G52421",
            "addresse"=>"Berlin Germany",
            "password"=>Hash::make("123")
        ]);
        DB::table("formateurs")->insert([
            "name"=>"HAREM",
            "prenom"=>"MARWANE",
            "email"=>"marwane@gmail.com",
            "phone_number"=>"06000000",
            "Cin"=>"G52421",
            "addresse"=>"Berlin Germany",
            "password"=>Hash::make("123")
        ]);
        DB::table("stagiaires")->insert([
            "name"=>"SROUR",
            "prenom"=>"HAMZA",
            "email"=>"HAMZA@gmail.com",
            "phone_number"=>"06000000",
            "Cin"=>"G52421",
            "addresse"=>"Berlin Germany",
            "password"=>Hash::make("123"),
            "groupe_id"=> 1 ,
            "filiere_id"=> 1
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
