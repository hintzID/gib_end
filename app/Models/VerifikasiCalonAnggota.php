<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiCalonAnggota extends Model
{
    use HasFactory;

    protected $table = 'verifikasi_calon_anggota';

    protected $fillable = [
        'calon_anggota_id',
        'verifikasi',
        'catatan',
    ];

    public function calonAnggota()
    {
        return $this->belongsTo(CalonAnggota::class, 'calon_anggota_id');
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
}
