<?php

namespace App\Http\Controllers;

use App\DataTables\InconformidadesDataTable;
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
        $this->service = Incofo::class;
        $this->dataTable = InconformidadesDataTable::class;
        $this->paramsCreate = [
            'cargos' => CargoService::getCargosForSelect()
        ];
        $this->paramsEdit = [
            'cargos' => CargoService::getCargosForSelect()
        ];
        $this->view = 'membros';
    }
}
