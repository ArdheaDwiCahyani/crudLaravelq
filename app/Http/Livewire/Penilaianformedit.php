<?php

namespace App\Http\Livewire;
use App\Models\kriteria;
use App\Models\alternatif_kos;
use App\Models\penilaian;
use App\Models\sub_kriteria;

use Livewire\Component;

class Penilaianformedit extends Component
{
    public $datakriteria = [];
    public $kos_id, $krit_and_sub;

    protected $rules = [
        'kos_id' => 'required',
        'krit_and_sub.*' => 'required',
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($penilaian)
    {
        if ($penilaian) {
            $this->krit_and_sub = [];
            $this->kos_id = $penilaian->first()->kos_id;
            foreach ($penilaian as $value) {
                $this->krit_and_sub[$value->kriteria_id] = strval($value->nilai);
            }
        } else {
            return redirect()->to('/penilaian/');
        }
    }
    public function update(){
        $this->resetErrorBag();
        $validated = $this->validate();
        foreach ($this->krit_and_sub as $kriteria_id => $nilai) {
            $data = [
                'kos_id' => $validated['kos_id'],
                'kriteria_id' => $kriteria_id,
                "nilai" => $nilai
            ];
            penilaian::where('kos_id', $this->kos_id)->where('kriteria_id', $kriteria_id)->update($data);
        }
        return redirect()->to('penilaian');
    }

    public function render()
    {
        $data_kriteria = Kriteria::get();
        $this->datakriteria = [];
        foreach( $data_kriteria as $data){
            $sub = sub_kriteria::where('kriteria_id', $data->id)->get();
            $this->datakriteria[] = [
                'kriteria' => $data,
                'sub_kriteria' => $sub
            ];
        }
        $alternatif_kos = alternatif_kos::get();
        return view('livewire.penilaianformedit', [
            'alternatif_kos' => $alternatif_kos,
            'data_kriteria' => $this->datakriteria
        ]);
    }
}
