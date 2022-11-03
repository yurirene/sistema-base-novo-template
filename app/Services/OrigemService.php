<?php 

namespace App\Services;

use App\Models\Origem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class OrigemService
{

    public static function getToSelect() : array
    {
        try {
            return Origem::all()->pluck('nome', 'id')->toArray();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function store(array $request) : ?Origem
    {
        try {
            return Origem::create([
                'nome' => $request['nome'],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, Origem $origem) : ?Origem
    {
        try {
            $origem->update([
                'nome' => $request['nome'],
            ]);
            return $origem;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function delete($origem) : void
    {
        try {
            $origem = Origem::find($origem);
            $origem->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
