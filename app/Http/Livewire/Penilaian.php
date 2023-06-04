<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\alternatif_kos;
use App\Models\kriteria;
use App\Models\sub_kriteria;
use Illuminate\Support\Str;

class Penilaian extends Component
{

    public function render()
    {

        $alternatif_data = alternatif_kos::get();
        $nilai = [];
        foreach ($alternatif_data as $alternatif) {
            $nilai_sub = sub_kriteria::with('kriteria')->where('kriteria_id', $alternatif->kriteria_id)->where('id', $alternatif->sub_kriteria_id)->get();
            foreach ($nilai_sub as $sub) {
                $nilai[$alternatif->nama_kos][$alternatif->kriteria_id] = [
                    'sub_kriteria_id' => $sub->id,
                    'bobot_sub' => $sub->bobot_sub,
                    'tipe' => $sub->kriteria->tipe
                ];
            }
        }
        $alternatif_by_kriterias = alternatif_kos::with(['kriteria', 'sub_kriteria'])->get()->groupBy('kriteria_id');
        $groupingByType = [];

        foreach ($alternatif_by_kriterias as $kriteria_id => $alternatifs) {
            $min_value = null;
            $max_value = null;
            $tipe_kriteria = null;

            foreach ($alternatifs as $alternatif) {
                $tipe_kriteria = $alternatif->kriteria->tipe;

                foreach ($alternatif->sub_kriteria as $sub_kriteria) {
                    if ($tipe_kriteria === 'Cost') {
                        if ($min_value === null || $sub_kriteria->bobot_sub < $min_value) {
                            $min_value = $sub_kriteria->bobot_sub;
                        }
                    } elseif ($tipe_kriteria === 'Benefit') {
                        if ($max_value === null || $sub_kriteria->bobot_sub > $max_value) {
                            $max_value = $sub_kriteria->bobot_sub;
                        }
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

        foreach ($alternatif_by_kriterias as $kriteria_id => $alternatifs) {
            $min_value = null;
            $max_value = null;
            $tipe_kriteria = null;

            foreach ($alternatifs as $alternatif) {
                $tipe_kriteria = $alternatif->kriteria->tipe;

                foreach ($alternatif->sub_kriteria as $sub_kriteria) {
                    if ($tipe_kriteria === 'Cost') {
                        if ($min_value === null || $sub_kriteria->bobot_sub < $min_value) {
                            $min_value = $sub_kriteria->bobot_sub;
                        }
                    } elseif ($tipe_kriteria === 'Benefit') {
                        if ($max_value === null || $sub_kriteria->bobot_sub > $max_value) {
                            $max_value = $sub_kriteria->bobot_sub;
                        }
                    }
                }
            }

            foreach ($alternatifs as $alternatif) {
                $nama_kos = $alternatif->nama_kos;

                if (!isset($hasil_alternatif[$nama_kos])) {
                    $hasil_alternatif[$nama_kos] = [];
                }

                $sub_kriteria = $alternatif->sub_kriteria->where('kriteria_id', $kriteria_id)->first();
                $nilai = ($tipe_kriteria === 'Cost') ? $min_value / $sub_kriteria->bobot_sub : $sub_kriteria->bobot_sub / $max_value;

                $alternatif_data = [
                    'kriteria_id' => $kriteria_id,
                    'hasil' => $nilai,
                ];

                $hasil_alternatif[$nama_kos][] = $alternatif_data;
            }
        }

        // Menyusun data yang akan dikembalikan
        $return_data = [];

        foreach ($hasil_alternatif as $nama_kos => $alternatif_data) {
            $return_data[$nama_kos] = [];

            foreach ($alternatif_data as $data) {
                $kriteria_id = $data['kriteria_id'];
                $hasil = $data['hasil'];

                $return_data[$nama_kos][$kriteria_id] = $hasil;
            }
        }
        $hasil_akhir = [];

        foreach ($return_data as $nama_kos => $kriteria_data) {
            $hasil_per_alternatif = 0;

            foreach ($kriteria_data as $kriteria_id => $hasil) {
                $bobot_kriteria = kriteria::where('id', $kriteria_id)->value('bobot'); // Ambil bobot kriteria berdasarkan kriteria_id
                $hasil_per_alternatif += $hasil * $bobot_kriteria;
            }

            $hasil_akhir[] = [
                'nama_kos' => $nama_kos,
                'hasil' => $hasil_per_alternatif,
            ];
        }

        return view('livewire.penilaian', [
            'data' => $hasil_akhir
        ]);
    }
}
