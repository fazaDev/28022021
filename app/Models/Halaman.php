<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    use HasFactory;

    protected $table = 'halaman';

    protected $guarded = [];

    public function getDateFormattedAttribute()
    {
        return date('d-m-Y', strtotime($this->created_at));
    }
}
