<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonMitra extends Model
{
    use HasFactory;

    protected $table = 'calon_mitra';
    protected $fillable = [
        'nama_pondok',
        'alamat',
        'tanggal_berdiri',
        'nama_pimpinan',
        'profesi',
        'alamat_pimpinan',
        'no_hp_pimpinan',
        'jumlah_pengurus_menetap',
        'jumlah_pengurus_tidak_menetap',
        'jumlah_yatim_piatu',
        'jumlah_yatim',
        'jumlah_piatu',
        'jumlah_mustahiq',
        'jumlah_dll',
        'keterangan_jumlah_dll',
        'jumlah_tk',
        'jumlah_sd',
        'jumlah_smp',
        'jumlah_sma',
        'jumlah_kuliah',
        'status_milik_tanah',
        'luas_tanah',
        'keterangan_fasilitas',
        'sumber_air',
        'tingkat_layak',
        'prioritas_id',
    ];

    public function pondok()
    {
        return $this->hasOne(Pondok::class);
    }

    public function prioritas()
    {
        return $this->belongsTo(Prioritas::class);
    }

}
