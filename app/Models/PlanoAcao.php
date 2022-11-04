<?php

namespace App\Models;

use App\Casts\MoneyBrCast;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoAcao extends Model
{
    use HasFactory, Auditable;

    protected $table = 'plano_acoes';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $casts = [
        'quanto' => MoneyBrCast::class
    ];
}
