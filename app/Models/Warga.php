<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $guarded = ['id'];

    function pekerjaan()
    {
        return $this->hasMany(PekerjaanWarga::class);
    }
    function hobi()
    {
        return $this->hasMany(HobiWarga::class);
    }
    public function vaksin()
    {
        return $this->hasOne(VaksinWarga::class);
    }
    function agama()
    {
        return $this->hasOne(AgamaWarga::class);
    }
}
