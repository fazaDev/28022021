<?php

namespace App\Http\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSiswa extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['reloadSiswa' => '$refresh'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $perPage = 10;
        $searchSiswa = '%' . $this->search . '%';

        return view('livewire.siswa.show-siswa', [
            'siswa' => Siswa::where('nama', 'like', $searchSiswa)->paginate($perPage)
        ]);
    }
}
