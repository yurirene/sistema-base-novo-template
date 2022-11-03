<?php 

namespace App\Services;

use App\Models\Status;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Throwable;

class StatusService
{
    public static function store(array $request) : ?Status
    {
        try {
            return Status::create([
                'nome' => $request['nome'],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function update(array $request, Status $status) : ?Status
    {
        try {
            $status->update([
                'nome' => $request['nome'],
            ]);
            return $status;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function delete($status) : void
    {
        try {
            $status = Status::find($status);
            $status->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
