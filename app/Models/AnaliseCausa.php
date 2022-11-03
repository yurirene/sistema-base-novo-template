<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnaliseCausa extends Model
{
    use HasFactory, Auditable;
    protected $table = 'analise_causas';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
