<?php

namespace App\Http\Controllers;

use App\DataTables\NiveisDataTable;
use App\Models\AnaliseCausa;
use App\Models\Nivel;
use App\Services\AnaliseCausaService;
use App\Services\NivelService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class AnaliseCausaController extends Controller
{
    protected $model;
    protected $service;
    protected $dataTable;
    protected $paramsCreate;
    protected $paramsEdit;
    protected $paramsIndex;
    protected $view;
    protected $routeIndex;

    public function __construct() 
    {
        $this->model = AnaliseCausa::class;
        $this->service = AnaliseCausaService::class;
        $this->routeIndex = 'inconformidades';
    }

    public function store(Request $request)
    {
        try {
            $this->service::store($request->all());
            return redirect()->route( $this->routeIndex . '.edit', $request->inconformidade_id)
                ->with(['mensagem' => ['tipo' => 'success', 'mensagem' => 'Registro salvo com sucesso!'], 'aba' => 'tratativa']);
        } catch (\Throwable $th) {
            Log::error([
                'erro' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ]);

            return redirect()->back()->withErrors(['Erro ao realizar essa operação.'])->withInput()->with('aba', 'tratativa');
        }
    }

   

    public function update($model, Request $request)
    {
        try {
            $model = $this->model::find($model);
            $this->service::update($request->all(), $model);
            return redirect()->route( $this->routeIndex . '.edit', $request->inconformidade_id)
                ->with(['mensagem' => ['tipo' => 'success', 'mensagem' => 'Registro atualizado com sucesso!'], 'aba' => 'tratativa']);
        } catch (\Throwable $th) {

            Log::error([
                'erro' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ]);
            return redirect()->back()->withErrors(['Erro ao realizar essa operação.'])->withInput()->with('aba', 'tratativa');
        }
    }
}
