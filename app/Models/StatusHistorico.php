<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusHistorico extends Model
{
    use HasFactory;
    protected $table = 'status_historicos';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
