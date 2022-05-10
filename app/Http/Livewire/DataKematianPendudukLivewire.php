<?php

namespace App\Http\Livewire;

use App\Models\DataKematianPenduduk;
use Livewire\Component;

class DataKematianPendudukLivewire extends Component
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
            $kematian = DataKematianPenduduk::orderBy('nama')->orWhere('nama', 'LIKE', '%' . $this->search . '%')->orWhere('nik', 'LIKE', '%' . $this->search . '%')->paginate(20);
        } else {
            $kematian = DataKematianPenduduk::orderBy('nama')->paginate(20);
        }

        return view('livewire.data-kematian-penduduk-livewire', compact('kematian'));
    }
}
