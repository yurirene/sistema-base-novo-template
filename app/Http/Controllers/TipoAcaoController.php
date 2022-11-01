<?php

namespace App\Http\Controllers;

use App\DataTables\TipoAcaoDataTable;
use App\Models\TipoAcao;
use App\Services\TipoAcaoService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;

class TipoAcaoController extends Controller
{
    use ControllerPadraoTrait;

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
        $this->model = TipoAcao::class;
        $this->service = TipoAcaoService::class;
        $this->dataTable = TipoAcaoDataTable::class;
        $this->paramsIndex = [
            'route' => route('tipo-acao.store'),
            'titulo' => 'Tipos de Ações'
        ];
        $this->routeIndex = 'tipo-acao';
        $this->view = 'parametros';
    }
}
