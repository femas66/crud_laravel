<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgamaWarga extends Model
{
    use HasFactory;
    protected $table = 'agama_warga';
    protected $guarded = ['id'];
    
}
