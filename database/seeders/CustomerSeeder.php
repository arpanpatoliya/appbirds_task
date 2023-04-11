<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30 ; $i++) { 
            DB::table('customers')->insert([
                'name' => 'customer' .$i,
                'email' => 'customer' .$i.'@gmail.com',
                'country' => 'Ind',
                'mobile' => '98131213' .$i,
                'DOB' => date('Y-m-d'),
                'about_you' => 'test dis' .$i,
            ]);
        }
        
    }
}
