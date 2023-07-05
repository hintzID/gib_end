<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPenyaluranDana extends Model
{
    use HasFactory;

    protected $table = 'trip_penyaluran_dana';

    protected $fillable = [
        'trip_id',
        'pondok_id',
        'urutan_trip',
    ];

    public function daftarTrip()
    {
        return $this->belongsTo(DaftarTrip::class, 'trip_id');
    }

    public function pondok()
    {
        return $this->belongsTo(Pondok::class, 'pondok_id');
    }
}
