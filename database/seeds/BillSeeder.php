<?php

use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill')->insert([
        	['id_customer' => 1, 'date_order' => '2017-03-24', 'payment' => 'ATM','note' => 'Khong co gi','created_at' => new DateTime()],
        	['id_customer' => 2, 'date_order' => '2017-02-23', 'payment' => 'COD','note' => 'Vui lòng giao hàng trước 6h','created_at' => new DateTime()],
        	['id_customer' => 3, 'date_order' => '2017-02-25', 'payment' => 'COD','note' => 'note','created_at' => new DateTime()],
        	['id_customer' => 4, 'date_order' => '2017-03-22', 'payment' => 'ATM','note' => 'Vui lòng giao hàng trước 5h','created_at' => new DateTime()],
			
    	]);
    }
}
