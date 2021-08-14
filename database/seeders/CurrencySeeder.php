<?php

namespace Database\Seeders;

use App\ServiceApi\AwesomeApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['value' => 0.00, 'code' => 'USD', 'created_at' => date('Y-m-d H:i:s')],

            ['value' => 0.00, 'code' => 'EUR', 'created_at' => date('Y-m-d H:i:s')],

            ['value' => 0.00, 'code' => 'BTC', 'created_at' => date('Y-m-d H:i:s')],
        ];
        
        DB::table('currency')->insert($data);
    }
}
