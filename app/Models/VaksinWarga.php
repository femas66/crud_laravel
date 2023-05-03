<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinWarga extends Model
{
    use HasFactory;
    protected $table = 'vaksin_warga';
    protected $guarded = ['id'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
