<?php

namespace Database\Seeders;

use App\Models\Voivodeship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoivodeshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        $data[] = ['name' => 'dolnośląskie'];
        $data[] = ['name' => 'kujawsko-pomorskie'];
        $data[] = ['name' => 'lubelskie'];
        $data[] = ['name' => 'lubuskie'];
        $data[] = ['name' => 'łódzkie'];
        $data[] = ['name' => 'małopolskie'];
        $data[] = ['name' => 'mazowieckie'];
        $data[] = ['name' => 'opolskie'];
        $data[] = ['name' => 'podkarpackie'];
        $data[] = ['name' => 'podlaskie'];
        $data[] = ['name' => 'pomorskie'];
        $data[] = ['name' => 'śląskie'];
        $data[] = ['name' => 'świętokrzyskie'];
        $data[] = ['name' => 'warmińsko-mazurskie'];
        $data[] = ['name' => 'wielkopolskie'];
        $data[] = ['name' => 'zachodniopomorskie'];

        Voivodeship::insert($data);
    }
}
