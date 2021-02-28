<?php

namespace Database\Seeders;

use App\Models\Spp;
use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Triya Apriana',
            'email' => 'triyaapriana@gmail.com',
            'password' => bcrypt('secret123'),
            'role' => 'admin',
            'created_at' => now()
        ]);

        User::create([
            'name' => 'Serly Fadilla',
            'email' => 'pt-001@paudteratai.com',
            'password' => bcrypt('123456'),
            'role' => 'user',
            'created_at' => now()
        ]);

        Siswa::create([
            'user_id' => 2,
            'ind' => 'PT-001',
            'nama' => 'Serly Fadilla',
            'tanggal_lahir' => now(),
            'tempat_lahir' => 'Batang Hari',
            'agama' => 'Islam',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Sunda Kelapa RT. 15 Ds. Bukit Harapan',
            'orang_tua' => 'Alamsyah D'
        ]);


        Guru::create([
            'nuptk' => '1982739293001',
            'nama' => 'Sri Swarni',
            'tanggal_lahir' => now(),
            'tempat_lahir' => 'Batang Hari',
            'agama' => 'Islam',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Sunda Kelapa RT. 15 Ds. Bukit Harapan'
        ]);
    }
}
