<?php

namespace App\Http\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithPagination;

class ShowGuru extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['reloadGuru' => '$refresh'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $perPage = 10;
        $searchGuru = '%' . $this->search . '%';

        return view('livewire.guru.show-guru', [
            'guru' => Guru::where('nama', 'like', $searchGuru)->paginate($perPage)
        ]);
    }
}
