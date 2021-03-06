<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'acc_mandiv_id', 'acc_hrd_id', 'tgl_izin', 'wkt_mulai', 'wkt_selesai', 'keterangan'];
    public function acc_mandiv()
    {
        return $this->belongsTo(Acc_mandiv::class);
    }
    public function acc_hrd()
    {
        return $this->belongsTo(Acc_hrd::class);
    }
}
