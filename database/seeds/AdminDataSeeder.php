<?php

use Illuminate\Database\Seeder;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('users')->insert(array (
            0 => 
            array (
                
                'user_id' => 'Admin001',
                'name' => 'Admin',
                'email' => 'admin@colan.com',
                'password' => Hash::make('admin123'),
                'user_type' => '1',
                
            ),
            
        ));
    }
}
