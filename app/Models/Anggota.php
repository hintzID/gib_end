<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = [
        'verifikasi_calon_anggota_id',
    ];

    public function verifikasiCalonAnggota()
    {
        return $this->belongsTo(VerifikasiCalonAnggota::class, 'verifikasi_calon_anggota_id');
    }

    public function user()
{
    return $this->hasOne(User::class);
}

public function daftarTrip()
{
    return $this->hasOne(DaftarTrip::class);
}
}
