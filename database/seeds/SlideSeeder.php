<?php

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slide')->insert([
        	['link' => 'google.com', 'image' => 'banner1.jpg'],
			['link' => 'google.com', 'image' => 'banner2.jpg'],
			['link' => 'google.com', 'image' => 'banner3.jpg'],
			['link' => 'google.com', 'image' => 'banner4.jpg']
    	]);
    }
}
