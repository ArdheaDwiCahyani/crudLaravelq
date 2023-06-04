<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\alternatif_kos;
use App\Models\kriteria;
use App\Models\pemilik;
use App\Models\sub_kriteria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        pemilik::create([
            'nama' => 'Abdul',
            'jenis_kelamin' => 'Laki-laki',
            'no_telp' => '12345678'
        ]);
        alternatif_kos::create([
            'nama_kos' => 'Alternatif1',
            'jenis_kos' => 'Putra',
            'alamat' => 'jl.golf',
            'pemilik_id' => 1
        ]);
        alternatif_kos::create([
            'nama_kos' => 'Alternatif2',
            'jenis_kos' => 'Putra',
            'alamat' => 'jl.golf',
            'pemilik_id' => 1
        ]);
        alternatif_kos::create([
            'nama_kos' => 'Alternatif3',
            'jenis_kos' => 'Putra',
            'alamat' => 'jl.golf',
            'pemilik_id' => 1
        ]);
        alternatif_kos::create([
            'nama_kos' => 'Alternatif4',
            'jenis_kos' => 'Putra',
            'alamat' => 'jl.golf',
            'pemilik_id' => 1
        ]);
        alternatif_kos::create([
            'nama_kos' => 'Alternatif5',
            'jenis_kos' => 'Putra',
            'alamat' => 'jl.golf',
            'pemilik_id' => 1
        ]);
        kriteria::create([
            'kriteria' => 'Biaya',
            'bobot' => '30',
            'tipe' => 'Cost'
        ]);
        kriteria::create([
            'kriteria' => 'Fasilitas',
            'bobot' => '25',
            'tipe' => 'Benefit'
        ]);
        kriteria::create([
            'kriteria' => 'Jarak',
            'bobot' => '10',
            'tipe' => 'Cost'
        ]);
        kriteria::create([
            'kriteria' => 'Luas Kamar',
            'bobot' => '20',
            'tipe' => 'Benefit'
        ]);
        kriteria::create([
            'kriteria' => 'Keamanan',
            'bobot' => '15',
            'tipe' => 'Benefit'
        ]);
        sub_kriteria::create([
            'kriteria_id' => '1',
            'sub_kriteria' => '> = 1.000.000',
            'bobot_sub' => '1',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '1',
            'sub_kriteria' => '< 1.000.000',
            'bobot_sub' => '2',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '1',
            'sub_kriteria' => '< 750.000',
            'bobot_sub' => '3',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '1',
            'sub_kriteria' => '< 500.000',
            'bobot_sub' => '4',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '1',
            'sub_kriteria' => '< = 300.000',
            'bobot_sub' => '5',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '2',
            'sub_kriteria' => 'Kasur, Lemari',
            'bobot_sub' => '1',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '2',
            'sub_kriteria' => 'Kasur, Lemari, Kipas Angin',
            'bobot_sub' => '2',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '2',
            'sub_kriteria' => 'Kasur, Lemari, Kipas Angin, Meja',
            'bobot_sub' => '3',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '2',
            'sub_kriteria' => 'Kasur, Lemari, AC, Meja',
            'bobot_sub' => '4',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '2',
            'sub_kriteria' => 'Kasur, Lemari, AC, Meja, Kursi, TV',
            'bobot_sub' => '5',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '3',
            'sub_kriteria' => '> = 3km',
            'bobot_sub' => '1',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '3',
            'sub_kriteria' => '< 3km',
            'bobot_sub' => '2',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '3',
            'sub_kriteria' => '< 1km',
            'bobot_sub' => '3',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '3',
            'sub_kriteria' => '< 500m',
            'bobot_sub' => '4',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '3',
            'sub_kriteria' => '< 250m',
            'bobot_sub' => '5',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '4',
            'sub_kriteria' => '3 x 3',
            'bobot_sub' => '1',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '4',
            'sub_kriteria' => '3 x 4',
            'bobot_sub' => '2',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '4',
            'sub_kriteria' => '4 x 4',
            'bobot_sub' => '3',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '4',
            'sub_kriteria' => '5 x 5',
            'bobot_sub' => '4',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '4',
            'sub_kriteria' => '5 x 6',
            'bobot_sub' => '5',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '5',
            'sub_kriteria' => 'Tidak Aman',
            'bobot_sub' => '1',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '5',
            'sub_kriteria' => 'Kurang Aman',
            'bobot_sub' => '2',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '5',
            'sub_kriteria' => 'Cukup Aman',
            'bobot_sub' => '3',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '5',
            'sub_kriteria' => 'Aman',
            'bobot_sub' => '4',
        ]);
        sub_kriteria::create([
            'kriteria_id' => '5',
            'sub_kriteria' => 'Sangat Aman',
            'bobot_sub' => '5',
        ]);
    }
}
