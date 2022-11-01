<?php 

namespace App\Services;

use App\Models\Etapa;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class EtapaService
{

    public static function store(array $request) : ?Etapa
    {
        try {
            return Etapa::create([
                'nome' => $request['nome'],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, Etapa $etapa) : ?Etapa
    {
        try {
            $etapa->update([
                'nome' => $request['nome'],
            ]);
            return $etapa;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function delete($etapa) : void
    {
        try {
            $etapa = Etapa::find($etapa);
            $etapa->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
