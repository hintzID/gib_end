<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarOta extends Model
{
    protected $table = 'daftar_ota';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'pekerjaan',
        'alamat',
        'nomor_hp',
        'anggota_id',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
