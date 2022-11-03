<?php 

namespace App\Services;

use App\Models\TipoAcao;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class TipoAcaoService
{

    public static function getToSelect() : array
    {
        try {
            return TipoAcao::all()->pluck('nome', 'id')->toArray();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function store(array $request) : ?TipoAcao
    {
        try {
            return TipoAcao::create([
                'nome' => $request['nome'],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, TipoAcao $nivel) : ?TipoAcao
    {
        try {
            $nivel->update([
                'nome' => $request['nome'],
            ]);
            return $nivel;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function delete($nivel) : void
    {
        try {
            $nivel = TipoAcao::find($nivel);
            $nivel->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
