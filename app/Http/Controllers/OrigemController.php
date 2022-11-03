<?php

namespace App\Http\Controllers;

use App\DataTables\OrigensDataTable;
use App\Models\Origem;
use App\Services\OrigemService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;

class OrigemController extends Controller
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
        $this->model = Origem::class;
        $this->service = OrigemService::class;
        $this->dataTable = OrigensDataTable::class;
        $this->paramsIndex = [
            'route' => route('origens.store'),
            'titulo' => 'Origens'
        ];
        $this->routeIndex = 'origens';
        $this->view = 'parametros';
    }
}
