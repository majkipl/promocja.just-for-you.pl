<?php

namespace Database\Seeders;

use App\Models\Free;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        $data[] = ['name' => 'bransoletka YES srebrna'];
        $data[] = ['name' => 'bransoletka YES srebrna'];
        $data[] = ['name' => 'worek 4F'];

        Free::insert($data);
    }
}
