<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acc_hrd extends Model
{
    use HasFactory;
    public function cutis()
    {
        return $this->hasMany(Cuti::class);
    }
}
