<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveis = [
            1 => 'Baixo',
            2 => 'Médio',
            3 => 'Alto',
        ];

        DB::beginTransaction();
        try {
            foreach ($niveis as $id => $nivel) {
                Nivel::updateOrCreate(['id' => $id], ['id' => $id, 'nome' => $nivel]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
