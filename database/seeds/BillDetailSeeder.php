<?php

use Illuminate\Database\Seeder;

class BillDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_detail')->insert([
        	['id_bill' => 1, 'id_product' => 1, 'quantity' => 10,'unit_price' => 200000, 'created_at' => new DateTime()],
        	['id_bill' => 1, 'id_product' => 2, 'quantity' => 15,'unit_price' => 100000, 'created_at' => new DateTime()],
        	['id_bill' => 1, 'id_product' => 3, 'quantity' => 11,'unit_price' => 300000, 'created_at' => new DateTime()],
        	['id_bill' => 1, 'id_product' => 4, 'quantity' => 20,'unit_price' => 400000, 'created_at' => new DateTime()],
        	['id_bill' => 2, 'id_product' => 1, 'quantity' => 30,'unit_price' => 500000, 'created_at' => new DateTime()],
        	['id_bill' => 2, 'id_product' => 2, 'quantity' => 10,'unit_price' => 300000, 'created_at' => new DateTime()],
        	['id_bill' => 3, 'id_product' => 3, 'quantity' => 15,'unit_price' => 100000, 'created_at' => new DateTime()],
        	['id_bill' => 3, 'id_product' => 4, 'quantity' => 10,'unit_price' => 250000, 'created_at' => new DateTime()],
        	['id_bill' => 4, 'id_product' => 3, 'quantity' => 10,'unit_price' => 260000, 'created_at' => new DateTime()],
        	['id_bill' => 4, 'id_product' => 4, 'quantity' => 10,'unit_price' => 200000, 'created_at' => new DateTime()],
    	]);
    }
}
