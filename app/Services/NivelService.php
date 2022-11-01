<?php 

namespace App\Services;

use App\Models\Nivel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class NivelService
{

    public static function store(array $request) : ?Nivel
    {
        try {
            return Nivel::create([
                'nome' => $request['nome'],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, Nivel $nivel) : ?Nivel
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
            $nivel = Nivel::find($nivel);
            $nivel->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
