<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_list = [
            1 => 'Em andamento',
            2 => 'Conclúido',
        ];
        DB::beginTransaction();
        try {
            foreach ($status_list as $id => $status) {
                Status::updateOrCreate(['id' => $id], ['id' => $id, 'nome' => $status]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
