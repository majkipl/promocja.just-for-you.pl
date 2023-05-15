<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        $data[] = ['name' => 'Stacjonarny'];
        $data[] = ['name' => 'Online'];

        Shop::insert($data);
    }
}
