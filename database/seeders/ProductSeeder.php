<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        $data[] = ['name' => 'AC9800 - Inteligenta Suszarka PROluxe YOU™'];
        $data[] = ['name' => 'S9880 - Inteligenta  Prostownica PROluxe YOU™'];
        $data[] = ['name' => 'CI98X8  - Inteligenta Lokówka PROluxe YOU™'];
        $data[] = ['name' => 'CI6X10 - 10mm Pro Tight CIENKA LOKÓWKA "afro loki"'];
        $data[] = ['name' => 'HC3000 - Maszynka do strzyżenia Power - X3 Series'];
        $data[] = ['name' => 'HC4000 - Maszynka do strzyżenia Power - X4 Series'];
        $data[] = ['name' => 'HC5000 - Maszynka do strzyżenia Power- X5 Series'];
        $data[] = ['name' => 'HC6000 - Maszynka do strzyżenia Power - X6 Series'];
        $data[] = ['name' => 'HG1000 - Golarka hybrydowa Omniblade'];
        $data[] = ['name' => 'HG2000 - Golarka hybrydowa Omniblade Face'];
        $data[] = ['name' => 'HG3000 - Golarka hybrydowa Omniblade Face & Body'];
        $data[] = ['name' => 'HG4000 - Golarka hybrydowa Omniblade Precision'];
        $data[] = ['name' => 'HG5000 - Golarka hybrydowa Omniblade Multi Pro'];
        $data[] = ['name' => 'S9100 - Prostownica PROluxe'];
        $data[] = ['name' => 'AC9140 - Suszarka PROluxe'];
        $data[] = ['name' => 'Ci9132 - Lokówka PROluxe 32mm'];
        $data[] = ['name' => 'Ci91X1 - Lokówka PROluxe Stożkowa 25-38 mm'];
        $data[] = ['name' => 'CI91AW - Falownica PROluxe'];
        $data[] = ['name' => 'AC7200 - SUSZARKA Supercare PRO'];
        $data[] = ['name' => 'AC7100 - SUSZARKA Supercare PRO'];
        $data[] = ['name' => 'AC7200W - SUSZARKA Supercare PRO'];
        $data[] = ['name' => 'S7970 - PROSTOWNICA Wet2Straight PRO'];
        $data[] = ['name' => 'D5901 - Suszarka Coconut Smooth'];
        $data[] = ['name' => 'CI5901 - Lokówka stożkowa Coconut Smooth 13-25mm'];
        $data[] = ['name' => 'S5901 - Prostownica Coconut Smooth'];
        $data[] = ['name' => 'EC9001 - Suszarka HYDRALUXE PRO'];
        $data[] = ['name' => 'S9001 - Prostownica HYDRALUXE PRO'];
        $data[] = ['name' => 'AC8901 - Suszarka HYDRALUXE'];
        $data[] = ['name' => 'S8901 - Prostownica HYDRALUXE'];
        $data[] = ['name' => 'AS8901 - Lokówko-Suszarka HYDRALUXE'];
        $data[] = ['name' => 'CI89H1 - Lokówka HYDRALUXE'];
        $data[] = ['name' => 'D5408  - Suszarka Mineral Glow'];
        $data[] = ['name' => 'CI5408 - Lokówka Stożkowa Mineral Glow'];
        $data[] = ['name' => 'S5408  - Prostownica Mineral Glow'];
        $data[] = ['name' => 'PG6000 - Multi-groomer Graphite Series PG6'];
        $data[] = ['name' => 'PG5000 - Multi-groomer Graphite Series PG5'];
        $data[] = ['name' => 'PG4000 - Multi-groomer Graphite Series PG4'];
        $data[] = ['name' => 'PG3000 - Multi-groomer Graphite Series PG3'];
        $data[] = ['name' => 'PG2000 - Multi-groomer Graphite Series PG2'];
        $data[] = ['name' => 'XR1570 - Golarka rotacyjna ULTIMATE SERIES R9'];
        $data[] = ['name' => 'XR1550 - Golarka rotacyjna ULTIMATE SERIES R8'];
        $data[] = ['name' => 'XR1530 - Golarka rotacyjna ULTIMATE SERIES R7'];

        Product::insert($data);
    }
}
