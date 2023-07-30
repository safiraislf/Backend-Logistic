<?php

namespace Database\Seeders;

use App\Models\Assets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assets::create([
            'code'          => 'BTH-1',
            'name'          => 'Baretone 15H (800 WATT)',
            'status'        => 'Ready',
        ]);

    }
}
