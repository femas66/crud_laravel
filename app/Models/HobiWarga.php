<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobiWarga extends Model
{
    use HasFactory;
    protected $table = 'hobi_warga';

    protected $guarded = ['id'];
    function warga() {
        return $this->belongsTo(Warga::class);
    }
}
