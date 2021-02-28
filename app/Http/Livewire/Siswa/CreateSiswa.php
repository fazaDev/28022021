<?php

namespace App\Http\Livewire\Siswa;

use App\Models\User;
use App\Models\Siswa;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CreateSiswa extends Component
{
    public $ind;
    public $nama;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $agama;
    public $jenis_kelamin;
    public $alamat;
    public $orang_tua;
    public $email;
    public $password;
    public $user_id;

    public function mount()
    {
        $this->initializedProperties();
    }

    public function render()
    {
        return view('livewire.siswa.create-siswa');
    }

    public function save()
    {
        $this->validate([
            // 'ind' => 'required|unique:siswa,ind',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'orang_tua' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        DB::beginTransaction();
        try {
            User::create([
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'name' => $this->orang_tua,
                'role' => 'user',
            ]);

            $user_id = DB::getPdo()->lastInsertId();
            $id_gen = IdGenerator::generate(['table' => 'siswa', 'field' => 'ind', 'length' => 6, 'prefix' => 'PT-']);

            Siswa::create([
                'user_id' => $user_id,
                'ind' => $id_gen,
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
                'title' => 'Tambah Siswa',
                'message' => 'Data siswa berhasil ditambahkan.'
            ]);

            $this->emit('reloadSiswa');
            $this->emit('closeModal', 'modal_create_siswa');
            $this->initializedProperties();
        } catch (\Throwable $th) {
            DB::rollback();

            $this->emit('flashMessage', [
                'type' => 'error',
                'title' => 'Tambah Siswa',
                'message' => 'Terjadi kesalahan : ' . $th->getMessage()
            ]);
        }

        DB::commit();
    }

    private function initializedProperties()
    {
        $this->ind = '';
        $this->nama = '';
        $this->tanggal_lahir = '';
        $this->tempat_lahir = '';
        $this->agama = '';
        $this->jenis_kelamin = '';
        $this->alamat = '';
        $this->orang_tua = '';
        $this->email = '';
        $this->password = '';
    }
}
