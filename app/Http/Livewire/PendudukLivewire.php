<?php

namespace App\Http\Livewire;

use App\Models\Penduduk;
use Livewire\Component;

class PendudukLivewire extends Component
{
    public $title,$search;
    protected $queryString = ['search'];

    public function mount($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        if ($this->search != null) {
            $penduduk   = Penduduk::orderBy('nama')->orWhere('nama', 'LIKE' ,'%' . $this->search . '%')->orWhere('nik', 'LIKE','%' . $this->search . '%')->paginate(20);
        } else {
            $penduduk   = Penduduk::orderBy('nama')->paginate(20);
        }
        return view('livewire.penduduk-livewire', compact('penduduk'));
    }
}
