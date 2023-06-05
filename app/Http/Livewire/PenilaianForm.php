<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kriteria;
use App\Models\alternatif_kos;
use App\Models\penilaian;
use App\Models\sub_kriteria;

class PenilaianForm extends Component
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
    public function store(){
        $validated = $this->validate();
        foreach ($this->krit_and_sub as $kos_id => $nilai) {
            $data = [
                'kos_id' => $validated['kos_id'],
                'kriteria_id' => $kos_id,
                "nilai" => $nilai
            ];
            penilaian::create($data);
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
        return view('livewire.penilaian-form', [
            'data_kriteria' => $this->datakriteria,
            'alternatif_kos' => $alternatif_kos
        ]);
    }
}
