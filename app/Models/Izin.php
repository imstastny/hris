<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'user_id', 'acc_mandiv_id', 'acc_hrd_id', 'tgl_izin', 'wkt_mulai', 'wkt_selesai', 'keterangan'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function acc_mandiv()
    {
        return $this->belongsTo(Acc_mandiv::class);
    }
    public function acc_hrd()
    {
        return $this->belongsTo(Acc_hrd::class);
    }
    // public function setTglIzinAttribute($value)
    // {
    //     $this->attributes['tgl_izin'] = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    // }
    // public function getTglIzinAttribute()
    // {
    //     return Carbon::createFromFormat('Y-m-d', $this->attributes['tgl_izin'])->format('d-M-Y');
    // }
}
