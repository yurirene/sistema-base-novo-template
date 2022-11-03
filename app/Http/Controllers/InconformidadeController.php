<?php

namespace App\Http\Controllers;

use App\DataTables\InconformidadesDataTable;
use App\Models\Inconformidade;
use App\Services\DepartamentoService;
use App\Services\InconformidadeService;
use App\Services\NivelService;
use App\Services\OrigemService;
use App\Services\TipoAcaoService;
use App\Services\UsuarioService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;

class InconformidadeController extends Controller
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
        $this->model = Inconformidade::class;
        $this->service = InconformidadeService::class;
        $this->dataTable = InconformidadesDataTable::class;
        $this->paramsCreate = [
            'titulo' => 'Não Conformidades',
            'usuarios' => UsuarioService::getUsersToSelect(),
            'tipo_acoes' => TipoAcaoService::getToSelect(),
            'niveis' => NivelService::getToSelect(),
            'origens' => OrigemService::getToSelect(),
            'departamentos' => DepartamentoService::getToSelect()
        ];
        $this->paramsEdit = [
            'titulo' => 'Não Conformidades',
            'usuarios' => UsuarioService::getUsersToSelect(),
            'tipo_acoes' => TipoAcaoService::getToSelect(),
            'niveis' => NivelService::getToSelect(),
            'origens' => OrigemService::getToSelect(),
            'departamentos' => DepartamentoService::getToSelect()
        ];
        $this->paramsIndex = [
            'titulo' => 'Não Conformidades'
        ];
        $this->view = 'inconformidades';
        $this->routeIndex = 'inconformidades';
    }
}
