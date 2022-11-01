<?php 

namespace App\Services;

use App\Models\Inconformidade;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class InconformidadeService
{

    public static function store(array $request) : ?Inconformidade
    {
        try {
            return Inconformidade::create([
                'descricao' => $request['descricao'],
                'evidencias' => $request['evidencias'],
                'contrariedade' => $request['contrariedade'],
                'previsao_retorno' => $request['previsao_retorno'],
                'departamento_id' => $request['departamento_id'] ?? null,
                'tipo_acao_id' => $request['tipo_acao_id'] ?? null,
                'etapa_id' => $request['etapa_id'] ?? null,
                'nivel_id' => $request['nivel_id'] ?? null,
                'status_id' => $request['status_id'] ?? null,
                'responsavel_id' => $request['responsavel_id'] ?? null,
                'criado_por' => auth()->id()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, Inconformidade $inconformidade) : ?Inconformidade
    {
        try {
            $inconformidade->update([
                'descricao' => $request['descricao'],
                'evidencias' => $request['evidencias'],
                'contrariedade' => $request['contrariedade'],
                'previsao_retorno' => $request['previsao_retorno'],
                'data_retorno' => $request['data_retorno'],
                'departamento_id' => $request['departamento_id'] ?? null,
                'tipo_acao_id' => $request['tipo_acao_id'] ?? null,
                'etapa_id' => $request['etapa_id'] ?? null,
                'nivel_id' => $request['nivel_id'] ?? null,
                'status_id' => $request['status_id'] ?? null,
                'responsavel_id' => $request['responsavel_id'] ?? null,
            ]);
            return $inconformidade;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function delete($inconformidade) : void
    {
        try {
            $inconformidade = Inconformidade::find($inconformidade);
            $inconformidade->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
