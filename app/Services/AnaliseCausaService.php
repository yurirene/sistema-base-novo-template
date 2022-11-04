<?php 

namespace App\Services;

use App\Models\AnaliseCausa;

class AnaliseCausaService
{


    public static function store(array $request) : ?AnaliseCausa
    {
        try {
            return AnaliseCausa::create([
                'porques' => $request['porques'],
                'inconformidade_id' => $request['inconformidade_id']
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, AnaliseCausa $AnaliseCausa) : ?AnaliseCausa
    {
        try {
            $AnaliseCausa->update([
                'porques' => $request['porques']
            ]);
            return $AnaliseCausa;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
