<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTrip extends Model
{
    use HasFactory;

    protected $table = 'daftar_trip';

    protected $fillable = [
        'nama_trip',
        'keterangan',
        'anggota_id',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

}
