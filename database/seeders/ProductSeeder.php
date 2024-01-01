<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use the ProductFactory to create dummy data
        // \App\Models\Product::factory(100)->create();
        $medicines = [
            'Paracetamol',
            'Ibuprofen',
            'Aspirin',
            'Omeprazole',
            'Amoxicillin',
            'Loratadine',
            'Simvastatin',
            'Metformin',
            'Cetirizine',
            'Losartan',
        ];

        // Create 10 products with more descriptive names
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'nama_obat' => $medicines[$i],
                'harga' => rand(5000, 20000),
                'status' => 'active',
                'image_url' => 'http://example.com/obat' . ($i + 1) . '.jpg',
                'tanggal_kadaluarsa' => now()->addDays(rand(1, 365)),
                'deskripsi' => 'Deskripsi obat ' . ($i + 1),
                'stok' => rand(50, 200),
                'produsen' => 'Produsen ' . ($i + 1),
                'kategori' => 'Kategori ' . ($i + 1),
                'komposisi' => 'Komposisi obat ' . ($i + 1),
                'kemasan' => 'Botol',
                'lokasi_penyimpanan' => 'Gudang ' . ($i + 1),
            ]);
        }
    }
}

