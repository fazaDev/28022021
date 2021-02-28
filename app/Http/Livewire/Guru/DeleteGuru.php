<?php

namespace App\Http\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DeleteGuru extends Component
{
    public $guruId;
    public $nama;

    protected $listeners = [
        'deleteGuru' => 'showModal'
    ];

    public function mount()
    {
        $this->initializedProperties();
    }

    public function render()
    {
        return view('livewire.guru.delete-guru');
    }

    public function showModal(Guru $guru)
    {
        $this->guruId = $guru->id;
        $this->nama = $guru->nama;
        $this->emit('showModal', 'modal_delete_guru');
    }

    public function delete()
    {
        DB::beginTransaction();
        try {
            Guru::findOrFail($this->guruId)->delete();
            $this->emit('flashMessage', [
                'type' => 'success',
                'title' => 'Sukses',
                'message' => 'Data guru berhasil dihapus!'
            ]);

            $this->emit('reloadGuru');
            $this->emit('closeModal', 'modal_delete_guru');
            $this->initializedProperties();
        } catch (\Throwable $th) {
            DB::rollback();

            $this->emit('flashMessage', [
                'type' => 'error',
                'title' => 'Error',
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
        $this->guruId = '';
        $this->nama = '';
    }
}
