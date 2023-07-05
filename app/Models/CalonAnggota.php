<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonAnggota extends Model
{
    use HasFactory;

    protected $table = 'calon_anggota';

    protected $fillable = [
        'email',
        'nama_lengkap',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'status',
        'pekerjaan',
        'no_hp',
        'pilihan_kontribusi',
        'organisasi_diikuti',
        'tentang_paskas',
        'pilar_paskas',
        'doa_harapan',
    ];

    public function verifikasiCalonAnggota()
    {
        return $this->hasOne(VerifikasiCalonAnggota::class);
    }
}
