<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Faker\Generator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Container\Container;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $faker;
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }
    public function run()
    {
        //
        \DB::table('admins')->insert([
            'name' => 'Shehzad Rana',
            'phone' => '+91-9265121885',
            'email' =>   'shehzadcse@yopmail.com',
            'alt_email' => 'bii@yopmail.com',
            'password' => Hash::make('@Virus969'),   
            'type' => 'admin',          
        ]);
        // for ($i=0; $i <5 ; $i++) { 
        //     \DB::table('admins')->insert([
        //         'name' =>  $this->faker->name,
        //         'phone' => '+91-'.rand(1111111111,9999999999),
        //         'email' =>   Str::random(10).'@yopmail.com',
        //         'alt_email' => Str::random(10).'@yopmail.com',
        //         'password' => Hash::make('password'),            
        //     ]);
        //     # code...
        // }
    }
}
