<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origem extends Model
{
    use HasFactory;
    protected $table = 'origens';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
