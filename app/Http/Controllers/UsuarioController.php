<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Services\UsuarioService;
use App\Traits\ControllerPadraoTrait;
use Illuminate\Http\Request;

class UsuarioController extends Controller
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
        $this->model = User::class;
        $this->service = UsuarioService::class;
        $this->dataTable = UsersDataTable::class;
        $this->paramsIndex = [
            'titulo' => 'Usuários'
        ];
        $this->paramsCreate = [
            'titulo' => 'Usuários'
        ];
        $this->paramsEdit = [
            'titulo' => 'Usuários'
        ];
        $this->routeIndex = 'usuarios';
        $this->view = 'usuarios';
    }
}
