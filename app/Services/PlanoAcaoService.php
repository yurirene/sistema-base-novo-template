<?php 

namespace App\Services;

use App\Models\PlanoAcao;

class PlanoAcaoService
{


    public static function store(array $request) : ?PlanoAcao
    {
        try {
            return PlanoAcao::create([
                'oque' => $request['oque'],
                'quem' => $request['quem'],
                'quando_inicio' => $request['quando_inicio'],
                'quando_fim' => $request['quando_fim'],
                'onde' => $request['onde'],
                'porque' => $request['porque'],
                'como' => $request['como'],
                'quanto' => $request['quanto'],
                'observacao' => $request['observacao'],
                'inconformidade_id' => $request['inconformidade_id']
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, PlanoAcao $PlanoAcao) : ?PlanoAcao
    {
        try {
            $PlanoAcao->update([
                'oque' => $request['oque'],
                'quem' => $request['quem'],
                'quando_inicio' => $request['quando_inicio'],
                'quando_fim' => $request['quando_fim'],
                'onde' => $request['onde'],
                'porque' => $request['porque'],
                'como' => $request['como'],
                'quanto' => $request['quanto'],
                'observacao' => $request['observacao'],
            ]);
            return $PlanoAcao;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
