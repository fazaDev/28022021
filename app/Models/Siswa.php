<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $guarded = [];

    public function getDateFormattedAttribute()
    {
        return date('d-m-Y', strtotime($this->tanggal_lahir));
    }

    public function getJkAttribute()
    {
        if ($this->jenis_kelamin == 'P') {
            return 'Perempuan';
        } else {
            return 'Laki-laki';
        }
    }

    public function spp()
    {
        return $this->hasMany(Spp::class);
    }
}
