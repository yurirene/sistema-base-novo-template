<?php

namespace App\Models;

use App\Casts\CodigoCast;
use App\Services\InconformidadeService;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inconformidade extends Model
{
    use HasFactory, Auditable, SoftDeletes;
    
    protected $table = 'inconformidades';
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $ultimo = InconformidadeService::getLastCodigo();
            $codigo = 'NC-' . date('mY') . '-' . ($ultimo+1);
            $model->codigo = $codigo;
        });
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function tipoAcao()
    {
        return $this->belongsTo(TipoAcao::class, 'tipo_acao_id');
    }

    public function origem()
    {
        return $this->belongsTo(Origem::class, 'origem_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel');
    }

    public function criadoPor()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }
    
    public function analiseCausa()
    {
        return $this->hasOne(AnaliseCausa::class, 'inconformidade_id');
    }

    public function planoAcao()
    {
        return $this->hasOne(PlanoAcao::class, 'inconformidade_id');
    }

}
