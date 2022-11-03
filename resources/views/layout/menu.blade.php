<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="/img/logo_empresa.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->is('home') ? 'active' : '' }} ">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('nao-conformidade*') ? 'active' : '' }}">
                    <a href="{{ route('inconformidades.index') }}" class='sidebar-link'>
                        <i class="bi bi-exclamation-octagon"></i>
                        <span>Não Conformidades</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('relatorios*') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-graph-down"></i>
                        <span>Relatórios</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{ request()->is('parametros*') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Parâmetros</span>
                    </a>
                    <ul class="submenu {{ request()->is('parametros*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->is('parametros/departamentos') ? 'active' : '' }}">
                            <a href="{{ route('departamentos.index') }}">Departamentos</a>
                        </li>
                        <li class="submenu-item {{ request()->is('parametros/niveis') ? 'active' : '' }}">
                            <a href="{{ route('niveis.index') }}">Níveis</a>
                        </li>
                        <li class="submenu-item {{ request()->is('parametros/origens') ? 'active' : '' }}">
                            <a href="{{ route('origens.index') }}">Origem</a>
                        </li>
                        <li class="submenu-item {{ request()->is('parametros/tipo-acao') ? 'active' : '' }}">
                            <a href="{{ route('tipo-acao.index') }}">Tipo de Ação</a>
                        </li>
                        <li class="submenu-item {{ request()->is('parametros/usuarios') ? 'active' : '' }}">
                            <a href="{{ route('usuarios.index') }}">Usuários</a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>