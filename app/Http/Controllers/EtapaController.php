<?php

namespace App\Http\Controllers;

use App\DataTables\EtapasDataTable;
use App\Models\Etapa;
use App\Services\EtapaService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;

class EtapaController extends Controller
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
        $this->model = Etapa::class;
        $this->service = EtapaService::class;
        $this->dataTable = EtapasDataTable::class;
        $this->paramsIndex = [
            'route' => route('etapas.store'),
            'titulo' => 'Etapas'
        ];
        $this->routeIndex = 'etapas';
        $this->view = 'parametros';
    }
}
