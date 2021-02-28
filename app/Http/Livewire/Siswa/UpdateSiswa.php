<?php

namespace App\Http\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UpdateSiswa extends Component
{
    public $siswaId;
    public $ind;
    public $nama;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $agama;
    public $jenis_kelamin;
    public $alamat;
    public $orang_tua;

    protected $listeners = [
        'updateSiswa' => 'showModal'
    ];

    public function render()
    {
        return view('livewire.siswa.update-siswa');
    }

    public function showModal(Siswa $siswa)
    {
        $this->siswaId = $siswa->id;
        $this->ind = $siswa->ind;
        $this->nama = $siswa->nama;
        $this->tanggal_lahir = $siswa->tanggal_lahir;
        $this->tempat_lahir = $siswa->tempat_lahir;
        $this->agama = $siswa->agama;
        $this->jenis_kelamin = $siswa->jenis_kelamin;
        $this->alamat = $siswa->alamat;
        $this->orang_tua = $siswa->orang_tua;
    }

    protected function rules()
    {
        return [
            'ind' => 'required|unique:siswa,ind,' . $this->siswaId,
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'orang_tua' => 'required',
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
            Siswa::findOrFail($this->siswaId)->update([
                'ind' => $this->ind,
                'nama' => $this->nama,
                'tanggal_lahir' => $this->tanggal_lahir,
                'tempat_lahir' => $this->tempat_lahir,
                'agama' => $this->agama,
                'jenis_kelamin' => $this->jenis_kelamin,
                'alamat' => $this->alamat,
                'orang_tua' => $this->orang_tua,
            ]);

            $this->emit('flashMessage', [
                'type' => 'success',
                'title' => 'Update Siswa',
                'message' => 'Data siswa berhasil diupdate!.'
            ]);

            $this->emit('reloadSiswa');
            $this->emit('closeModal', 'modal_update_siswa');
            $this->initializedProperties();
        } catch (\Throwable $th) {
            DB::rollback();

            $this->emit('flashMessage', [
                'type' => 'error',
                'title' => 'Update Siswa',
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
        $this->ind = '';
        $this->nama = '';
        $this->tanggal_lahir = '';
        $this->tempat_lahir = '';
        $this->agama = '';
        $this->jenis_kelamin = '';
        $this->alamat = '';
        $this->orang_tua = '';
    }
}
