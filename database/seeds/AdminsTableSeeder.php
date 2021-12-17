<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array(
		 'name' => "farhan",
		 'email' => 'nil26566@gmail.com',
		 'password' => bcrypt('test1234'),
		        	),
		        
		));
    }
}
