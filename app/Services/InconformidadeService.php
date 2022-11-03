<?php 

namespace App\Services;

use App\Models\Inconformidade;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Throwable;

class InconformidadeService
{

    public static function getLastCodigo() : int
    {
        return Inconformidade::where('codigo', 'like', 'NC-' . date('mY'). '%')->get()->count();
    }

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
                'origem_id' => $request['origem_id'] ?? null,
                'nivel_id' => $request['nivel_id'] ?? null,
                'responsavel_id' => $request['responsavel_id'] ?? null,
                'status_id' => 1,
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
                'departamento_id' => $request['departamento_id'] ?? null,
                'tipo_acao_id' => $request['tipo_acao_id'] ?? null,
                'origem_id' => $request['origem_id'] ?? null,
                'nivel_id' => $request['nivel_id'] ?? null,
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

    public static function getStatus(Inconformidade $inconformidade) : string
    {
        try {
            if ($inconformidade->status_id == 2) {
                return "<span class='badge badge-pill bg-success me-1'>" . $inconformidade->status->nome . "</span>";
            }
            $data_previsao = Carbon::parse($inconformidade->previsao_retorno);
            if ($data_previsao->gte(date('Y-m-d'))) {
                return "<span class='badge badge-pill bg-light-info me-1'>" . $inconformidade->status->nome . "</span>";
            }
            return "<span class='badge badge-pill bg-danger me-1'>Em Atraso - " . $data_previsao->diffInDays() . " dia(s)</span>";
        } catch (Throwable $th) {
            throw $th;
        }
    }
}
