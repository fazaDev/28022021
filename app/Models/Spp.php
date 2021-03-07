<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;

    protected $table = 'spp';

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
        // return $this->belongsTo(Siswa::class, 'siswa_id', 'id', 'ind');
    }

    public function getJbAttribute()
    {
        return number_format($this->jumlah_bayar, 2, '.', ',');
    }
}
