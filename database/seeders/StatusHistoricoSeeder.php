<?php

namespace Database\Seeders;

use App\Models\StatusHistorico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusHistoricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_list = [
            1 => 'Registro Criado',
            2 => 'Análise de Causas Adicionada',
            3 => 'Análise de Causas Alterada',
            4 => 'Plano de Ação Adicionado',
            5 => 'Plano de Ação Alterado',
            6 => 'Avaliação de Eficácia Adicionada',
            7 => 'Avaliação de Eficácia Alterada',
            8 => 'Encerrado',
        ];

        DB::beginTransaction();
        try {
            foreach ($status_list as $id => $status) {
                StatusHistorico::updateOrCreate(['id' => $id], ['id' => $id, 'nome' => $status]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
