<?php

namespace Database\Seeders;

use App\Models\Where;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data[] = ['name' => 'sklep on-line'];
        $data[] = ['name' => 'sklep stacjonarny'];
        $data[] = ['name' => 'Facebook'];
        $data[] = ['name' => 'Instagram'];
        $data[] = ['name' => 'Google'];
        $data[] = ['name' => 'od znajomych'];
        $data[] = ['name' => 'od sprzedawcy'];
        $data[] = ['name' => 'inne'];

        Where::insert($data);
    }
}
