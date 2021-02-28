<?php

namespace App\Http\Livewire\Spp;

use App\Models\Spp;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class IndexSpp extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $siswa_id, $uuid, $spp_bulan, $jumlah_bayar, $tanggal_bayar, $created_by, $sppId;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchSiswa = '%' . $this->search . '%';

        return view('livewire.spp.index-spp', [
            'pembayaran' => DB::table('spp')
                ->leftJoin('siswa', 'siswa.id', '=', 'spp.siswa_id')
                ->where('nama', 'like', $searchSiswa)
                ->orderBy('spp.tanggal_bayar', 'DESC')
                ->paginate(5),
            'siswa' => Siswa::get()
        ]);
    }

    public function clearForm()
    {
        $this->siswa_id = '';
        $this->spp_bulan = '';
        $this->jumlah_bayar = '';
        $this->tanggal_bayar = '';
    }

    public function store()
    {
        $created_by = auth()->user()->name;
        $uuid = IdGenerator::generate(['table' => 'spp', 'field' => 'uuid', 'length' => 8, 'prefix' => 'SPP-']);

        $this->validate([
            'siswa_id' => 'required',
            'spp_bulan' => 'required',
            // 'jumlah_bayar' => 'required|not_regex:/^Rp.\s\d{1,3}(\.\d{3})*?$/',
            'jumlah_bayar' => 'required',
            'tanggal_bayar' => 'required'
        ]);

        Spp::create([
            'siswa_id' => $this->siswa_id,
            'uuid' => $uuid,
            'spp_bulan' => $this->spp_bulan,
            'jumlah_bayar' => $this->jumlah_bayar,
            'tanggal_bayar' => $this->tanggal_bayar,
            'created_by' => $created_by,
        ]);

        $this->clearForm();
    }
}
