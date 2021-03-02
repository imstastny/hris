<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_mulai', 'tgl_selesai', 'jml_hari', 'deskripsi', 'catatan'];
}
