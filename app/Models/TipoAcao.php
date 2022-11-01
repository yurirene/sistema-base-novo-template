<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAcao extends Model
{
    use HasFactory;
    protected $table = 'tipo_acoes';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
