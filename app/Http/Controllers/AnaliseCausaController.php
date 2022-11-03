<?php

namespace App\Http\Controllers;

use App\DataTables\NiveisDataTable;
use App\Models\Nivel;
use App\Services\NivelService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;

class AnaliseCausaController extends Controller
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
        $this->model = Nivel::class;
        $this->service = NivelService::class;
        $this->dataTable = NiveisDataTable::class;
        $this->paramsIndex = [
            'route' => route('niveis.store'),
            'titulo' => 'Niveis'
        ];
        $this->routeIndex = 'niveis';
        $this->view = 'parametros';
    }
}
