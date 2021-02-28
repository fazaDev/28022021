<?php

namespace App\Http\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UpdateGuru extends Component
{
    public $guruId;
    public $nuptk;
    public $nama;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $agama;
    public $jenis_kelamin;
    public $alamat;

    protected $listeners = [
        'updateGuru' => 'showModal'
    ];

    public function render()
    {
        return view('livewire.guru.update-guru');
    }

    public function showModal(Guru $guru)
    {
        $this->guruId = $guru->id;
        $this->nuptk = $guru->nuptk;
        $this->nama = $guru->nama;
        $this->tanggal_lahir = $guru->tanggal_lahir;
        $this->tempat_lahir = $guru->tempat_lahir;
        $this->agama = $guru->agama;
        $this->jenis_kelamin = $guru->jenis_kelamin;
        $this->alamat = $guru->alamat;
    }

    protected function rules()
    {
        return [
            'nuptk' => 'required|unique:guru,nuptk,' . $this->guruId,
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ];
    }

    public function updated($property, $value)
    {
        if (trim($value)) {
            $this->validateOnly($property);
        } else {
            $this->resetErrorBag($property);
        }
    }

    public function update()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            Guru::findOrFail($this->guruId)->update([
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
                'title' => 'Update Guru',
                'message' => 'Data guru berhasil diupdate!'
            ]);

            $this->emit('reloadGuru');
            $this->emit('closeModal', 'modal_update_guru');
            $this->initializedProperties();
        } catch (\Throwable $th) {
            DB::rollback();

            $this->emit('flashMessage', [
                'type' => 'error',
                'title' => 'Update Guru',
                'message' => 'Terjadi kesalahan : ' . $th->getMessage()
            ]);
        }

        DB::commit();
    }

    public function cancel()
    {
        $this->initializedProperties();
    }

    private function initializedProperties()
    {
        $this->resetErrorBag();
        $this->nuptk = '';
        $this->nama = '';
        $this->tanggal_lahir = '';
        $this->tempat_lahir = '';
        $this->agama = '';
        $this->jenis_kelamin = '';
        $this->alamat = '';
    }
}
