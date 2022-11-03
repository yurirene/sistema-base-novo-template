<?php

namespace Database\Seeders;

use App\Models\TipoAcao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAcoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_list = [
            1 => 'Ação Corretiva',
            2 => 'Ação Preventiva',
            3 => 'Ação de Melhoria',
            4 => 'Outros',
        ];
        DB::beginTransaction();
        try {
            foreach ($status_list as $id => $status) {
                TipoAcao::updateOrCreate(['id' => $id], ['id' => $id, 'nome' => $status]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }        
    }
}
