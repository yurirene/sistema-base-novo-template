<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origem extends Model
{
    use HasFactory, Auditable;
    protected $table = 'origens';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
