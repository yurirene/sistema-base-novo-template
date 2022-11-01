<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InconformidadeController extends Controller
{
    use ControllerPadraoTrait;

    protected $model;
    protected $service;
    protected $dataTable;
    protected $paramsCreate;
    protected $paramsEdit;
    protected $view;

    public function __construct() 
    {
        $this->model = Membro::class;
        $this->service = MembroService::class;
        $this->dataTable = MembrosDataTable::class;
        $this->paramsCreate = [
            'cargos' => CargoService::getCargosForSelect()
        ];
        $this->paramsEdit = [
            'cargos' => CargoService::getCargosForSelect()
        ];
        $this->view = 'membros';
    }
}
