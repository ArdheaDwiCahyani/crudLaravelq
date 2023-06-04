<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kriteria;
use App\Models\alternatif_kos;
use App\Models\sub_kriteria;

class Alternatifkosform extends Component
{
    public $datakriteria = [];
    public $nama_kos, $jenis_kos, $krit_and_sub;

    protected $rules = [
        'nama_kos' => 'required',
        'jenis_kos' => 'required',
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store(){
        $validated = $this->validate();
        foreach ($this->krit_and_sub as $kriteria_id => $sub_kriteria_id) {
            $data = [
                'nama_kos' => $validated['nama_kos'],
                'jenis_kos' => $validated['jenis_kos'],
                'kriteria_id' => $kriteria_id,
                "sub_kriteria_id" => $sub_kriteria_id
            ];
            alternatif_kos::create($data);
        }
        return redirect()->to('alternatif_kos');
    }

    public function render()
    {
        
        return view('livewire.alternatifkosform', [
            'data_kriteria' => $this->datakriteria
        ]);
    }
}
