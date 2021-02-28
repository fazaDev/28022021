<?php

namespace App\Http\Livewire\Siswa;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeleteSiswa extends Component
{
    public $siswaId;
    public $nama;

    protected $listeners = [
        'deleteSiswa' => 'showModal'
    ];

    public function mount()
    {
        $this->initializedProperties();
    }

    public function render()
    {
        return view('livewire.siswa.delete-siswa');
    }

    public function showModal(Siswa $siswa)
    {
        $this->siswaId = $siswa->id;
        $this->nama = $siswa->nama;
        $this->emit('showModal', 'modal_delete_siswa');
    }

    public function delete()
    {
        DB::beginTransaction();
        try {
            Siswa::findOrFail($this->siswaId)->delete();
            $this->emit('flashMessage', [
                'type' => 'success',
                'title' => 'Hapus Siswa',
                'message' => 'Data siswa berhasil dihapus!'
            ]);

            $this->emit('reloadSiswa');
            $this->emit('closeModal', 'modal_delete_siswa');
            $this->initializedProperties();
        } catch (\Throwable $th) {
            DB::rollback();

            $this->emit('flashMessage', [
                'type' => 'error',
                'title' => 'Hapus Siswa',
                'message' => 'Terjadi kesalahan : ' . $th->getMessage()
            ]);
        }
        DB::commit();
    }

    public function cancel()
    {
        $this->initializedProperties();
    }

    public function initializedProperties()
    {
        $this->siswaId = '';
        $this->nama = '';
    }
}
