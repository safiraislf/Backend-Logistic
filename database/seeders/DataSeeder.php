<?php


namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Data::create([
            'name'      => 'Maziyatul ilma',
            'unit'      => 'Mahasiswa',
            'item'      => 'TV',
            'event'     => 'PKKMB',
            'pinjam'    => '18 Agustus 2023',
            'kembali'   => '25 Agustus 2023',
            'status'    => 'dipinjam',
        ]);
    }
}
