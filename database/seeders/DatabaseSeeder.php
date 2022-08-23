<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gambar_item;
use App\Models\Item;
use App\Models\Jenis;
use App\Models\Katalog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::insert([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            'username' => 'admin',
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-jwSQgCkm6QMwHg1uHfJ5DGG1bNZWiI-8kA&usqp=CAU',
            'password' => Crypt::encryptString(123456),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        User::insert([
            'username' => 'penjual',
            'name' => 'penjual',
            'role' => 'penjual',
            'email' => 'penjual@gmail.com',
            'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-jwSQgCkm6QMwHg1uHfJ5DGG1bNZWiI-8kA&usqp=CAU',
            'password' => Crypt::encryptString(123456),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        User::insert([
            'username' => 'supplier',
            'name' => 'supplier',
            'role' => 'supplier',
            'email' => 'supplier@gmail.com',
            'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-jwSQgCkm6QMwHg1uHfJ5DGG1bNZWiI-8kA&usqp=CAU',
            'password' => Crypt::encryptString(123456),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Jenis::insert([
            'jenis' => 'Buah',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Jenis::insert([
            'jenis' => 'Sayuran',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Item::insert([
            'nama_item' => 'Jeruk',
            'harga' => 2000,
            'deskripsi' => 'Barang Bagus Baru Datang',
            'jenis_id' => 1,
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Item::insert([
            'nama_item' => 'Sawi',
            'harga' => 2000,
            'deskripsi' => 'Barang Bagus Baru Datang',
            'jenis_id' => 2,
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Gambar_item::insert([
            'item_id' => 1,
            'gambar' => 'https://asset.kompas.com/crops/yHNh6CbQJfxUj8mBJT5B63mYo0w=/0x57:640x483/750x500/data/photo/2022/01/06/61d69e668e6c9.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Gambar_item::insert([
            'item_id' => 1,
            'gambar' => 'https://asset.kompas.com/crops/yHNh6CbQJfxUj8mBJT5B63mYo0w=/0x57:640x483/750x500/data/photo/2022/01/06/61d69e668e6c9.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Gambar_item::insert([
            'item_id' => 1,
            'gambar' => 'https://jubi.co.id/wp-content/uploads/2020/06/Buah-jeruk-Tempo.co_.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Gambar_item::insert([
            'item_id' => 2,
            'gambar' => 'https://cdf.orami.co.id/unsafe/cdn-cas.orami.co.id/parenting/images/sayur-sawi.width-800.jpegquality-80.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Gambar_item::insert([
            'item_id' => 2,
            'gambar' => 'https://cdn-1.timesmedia.co.id/images/2022/03/18/Sawi.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Gambar_item::insert([
            'item_id' => 2,
            'gambar' => 'https://cdn1-production-images-kly.akamaized.net/TpkzRAKGSD8GlWCKubphBCHIiwg=/1200x900/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2861894/original/082412900_1563939884-iStock-484686592.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Katalog::insert([
            'nama_item' => 'Jeruk',
            'harga' => 2000,
            'deskripsi' => 'Barang Bagus Baru Datang',
            'jenis_id' => 1,
            'satuan' => 'Kilogram',
            'gambar' => 'https://asset.kompas.com/crops/yHNh6CbQJfxUj8mBJT5B63mYo0w=/0x57:640x483/750x500/data/photo/2022/01/06/61d69e668e6c9.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Katalog::insert([
            'nama_item' => 'Sawi',
            'harga' => 2000,
            'deskripsi' => 'Barang Bagus Baru Datang',
            'jenis_id' => 2,
            'gambar' => 'https://cdf.orami.co.id/unsafe/cdn-cas.orami.co.id/parenting/images/sayur-sawi.width-800.jpegquality-80.jpg',
            'satuan' => 'Kilogram',
            'created_at' => date('Y-m-d H:i:s')
        ]);




    }

    // /storage/kelolaAkun/cendol.jpe
}
