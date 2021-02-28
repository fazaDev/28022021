<?php

namespace App\Http\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateGuru extends Component
{
    public $nuptk;
    public $nama;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $agama;
    public $jenis_kelamin;
    public $alamat;

    public function mount()
    {
        $this->initializedProperties();
    }

    public function render()
    {
        return view('livewire.guru.create-guru');
    }

    public function save()
    {
        $this->validate([
            'nuptk' => 'required|unique:guru,nuptk',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Guru::create([
                'nuptk' => $this->nuptk,
                'nama' => $this->nama,
                'tanggal_lahir' => $this->tanggal_lahir,
                'tempat_lahir' => $this->tempat_lahir,
                'agama' => $this->agama,
                'jenis_kelamin' => $this->jenis_kelamin,
                'alamat' => $this->alamat,
            ]);

            $this->emit('flashMessage', [
                'type' => 'success',
                'title' => 'Tambah Guru',
                'message' => 'Data guru berhasil ditambahkan.'
            ]);

            $this->emit('reloadGuru');
            $this->emit('closeModal', 'modal_create_guru');
            $this->initializedProperties();
        } catch (\Throwable $th) {
            DB::rollback();

            $this->emit('flashMessage', [
                'type' => 'error',
                'title' => 'Tambah Guru',
                'message' => 'Terjadi kesalahan : ' . $th->getMessage()
            ]);
        }

        DB::commit();
    }

    private function initializedProperties()
    {
        $this->nuptk = '';
        $this->nama = '';
        $this->tanggal_lahir = '';
        $this->tempat_lahir = '';
        $this->agama = '';
        $this->jenis_kelamin = '';
        $this->alamat = '';
    }
}
