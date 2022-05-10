<?php

namespace App\Http\Livewire;

use App\Models\DataPindahPenduduk;
use Livewire\Component;

class DataPindahPendudukLivewire extends Component
{
    public $title, $search;
    protected $queryString = ['search'];

    public function mount($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        if ($this->search != null) {
            $pindah = DataPindahPenduduk::orderBy('nama')->orWhere('nama', 'LIKE', '%' . $this->search . '%')->orWhere('nik', 'LIKE', '%' . $this->search . '%')->paginate(20);
        } else {
            $pindah = DataPindahPenduduk::orderBy('nama')->paginate(20);
        }

        return view('livewire.data-pindah-penduduk-livewire', compact('pindah'));
    }
}
