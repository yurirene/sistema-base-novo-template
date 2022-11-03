<?php

namespace Database\Seeders;

use App\Models\Origem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrigemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origens = [
            1 => 'Auditoria Externa',
            2 => 'Auditoria Interna',
            3 => 'Auditoria de Cliente',
            4 => 'Auditoria de Produto',
            5 => 'Auditoria de Processo',
            6 => 'Auditoria de Fornecedores',
            7 => 'Inspeção de Recebimento',
            8 => 'Processo',
            9 => 'Programa Interno',
            10 => 'Processos do SGQ',
        ];

        DB::beginTransaction();
        try {
            foreach ($origens as $id => $origem) {
                Origem::updateOrCreate(['id' => $id], ['id' => $id, 'nome' => $origem]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
