<?php

namespace App\Http\Controllers;

use App\DataTables\StatusDataTable;
use App\Models\Status;
use App\Services\StatusService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;

class StatusController extends Controller
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
        $this->model = Status::class;
        $this->service = StatusService::class;
        $this->dataTable = StatusDataTable::class;
        $this->paramsIndex = [
            'route' => route('status.store'),
            'titulo' => 'Status'
        ];
        $this->routeIndex = 'status';
        $this->view = 'parametros';
    }
}
