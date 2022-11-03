<?php 

namespace App\Services;

use App\Models\Departamento;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class DepartamentoService
{

    public static function getToSelect() : array
    {
        try {
            return Departamento::all()->pluck('nome', 'id')->toArray();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function store(array $request) : ?Departamento
    {
        try {
            return Departamento::create([
                'nome' => $request['nome'],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, Departamento $departamento) : ?Departamento
    {
        try {
            $departamento->update([
                'nome' => $request['nome'],
            ]);
            return $departamento;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function delete($departamento) : void
    {
        try {
            $departamento = Departamento::find($departamento);
            $departamento->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
