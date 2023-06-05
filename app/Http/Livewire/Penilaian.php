<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\alternatif_kos;
use App\Models\hasil;
use App\Models\kriteria;
use App\Models\penilaian as penilaians;
use Illuminate\Support\Str;

class Penilaian extends Component
{
    public function render()
    {
        $penilaian = penilaians::with(['alternatif_kos', 'kriteria'])->get()->groupBy('kos_id');
        $groupkos = collect($penilaian)->map(function ($data) {
            $nilai = collect($data)->map(function ($score) {
                return [
                    'kriteria_id' => $score->kriteria_id,
                    'nilai' => $score->nilai
                ];
            })->toArray();
            return [
                'kos_id' => collect($data)->first()->kos_id,
                'nama_kos' => collect($data)->first()->alternatif_kos->nama_kos,
                'nilai' => $nilai,
            ];
        });

        $score_by_kriterias = penilaians::with(['kriteria', 'alternatif_kos'])->get()->groupBy('kriteria_id');

        $groupingByType = [];

        foreach ($score_by_kriterias as $kriteria_id => $scores) {
            $min_value = null;
            $max_value = null;
            $tipe_kriteria = null;

            foreach ($scores as $score) {
                $kriteria = $score->kriteria; // Mengakses objek kriteria

                $tipe_kriteria = $kriteria->tipe; // Mengakses properti tipe dari objek kriteria

                if ($tipe_kriteria === 'Cost') {
                    if ($min_value === null || $score['nilai'] < $min_value) {
                        $min_value = $score['nilai'];
                    }
                } elseif ($tipe_kriteria === 'Benefit') {
                    if ($max_value === null || $score['nilai'] > $max_value) {
                        $max_value = $score['nilai'];
                    }
                }
            }

            $nilai = ($tipe_kriteria === 'Cost') ? $min_value : $max_value;

            $groupingByType[$kriteria_id] = [
                'tipe' => $tipe_kriteria,
                'nilai' => $nilai,
            ];
        }
        $hasil_alternatif = [];

        foreach ($score_by_kriterias as $kriteria_id => $scores) {
            $min_value = null;
            $max_value = null;
            $tipe_kriteria = null;

            foreach ($scores as $score) {
                $kriteria = $score->kriteria; // Mengakses objek kriteria

                $tipe_kriteria = $kriteria->tipe; // Mengakses properti tipe dari objek kriteria

                if ($tipe_kriteria === 'Cost') {
                    if ($min_value === null || $score['nilai'] < $min_value) {
                        $min_value = $score['nilai'];
                    }
                } elseif ($tipe_kriteria === 'Benefit') {
                    if ($max_value === null || $score['nilai'] > $max_value) {
                        $max_value = $score['nilai'];
                    }
                }
            }

            foreach ($scores as $score) {
                $kos_id = $score->kos_id;

                if (!isset($hasil_alternatif[$kos_id])) {
                    $hasil_alternatif[$kos_id] = [];
                }

                $nilai = ($tipe_kriteria === 'Cost') ? $min_value / $score['nilai'] : $score['nilai'] / $max_value;

                $alternatif_data = [
                    'kriteria_id' => $score->kriteria_id,
                    'hasil' => $nilai,
                ];

                $hasil_alternatif[$kos_id][] = $alternatif_data;
            }
        }

        // Menyusun data yang akan dikembalikan
        $return_data = [];

        foreach ($hasil_alternatif as $kos_id => $hasil) {
            $return_data[$kos_id] = [];

            foreach ($hasil as $data) {
                $kriteria_id = $data['kriteria_id'];
                $hasil = $data['hasil'];

                $return_data[$kos_id][$kriteria_id] = $hasil;
            }
        }
        $hasil_akhir = [];

        foreach ($return_data as $kos_id => $kriteria_data) {
            $hasil_per_alternatif = 0;

            foreach ($kriteria_data as $kriteria_id => $hasil) {
                $bobot_kriteria = kriteria::where('id', $kriteria_id)->value('bobot'); // Ambil bobot kriteria berdasarkan kriteria_id
                $hasil_per_alternatif += $hasil * $bobot_kriteria;
            }

            $hasil_akhir[] = [
                'kos_id' => $kos_id,
                'nama_kos' => alternatif_kos::where('id', $kos_id)->value('nama_kos'),
                'hasil_normalisasi' => $kriteria_data,
                'hasil' => $hasil_per_alternatif,
            ];
        }
        $results = collect($hasil_akhir)->sortByDesc(function ($result) {
            return $result['hasil'];
        })->values()->all();
        if (hasil::all()->count() != count($hasil_akhir)) {
            hasil::truncate();
            foreach ($results as $key => $data) {
                hasil::create(
                    [
                        'kos_id' => $data['kos_id'],
                        'nilai' => $data['hasil'],
                        'ranking' => $key+1,
                    ]
                );
            }
        };
        $kriteria = kriteria::all();
        return view('livewire.penilaian', [
            'kriteria' => $kriteria,
            'groupKos' => $groupkos,
            'hasil' => $hasil_akhir,
        ]);
    }
}
