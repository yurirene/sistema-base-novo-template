<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <h4>Análise das causas</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @if(!isset($model->analiseCausa))
                        {!! Form::open(['method' => 'POST', 'route' => 'analise-causa.store', 'class' => 'form-horizontal']) !!}
                        @else
                        {!! Form::model($model, ['route' => ['analise-causa.update', $models->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                        @endif

                        <div class="btn-group pull-right">
                        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit("Add", ['class' => 'btn btn-Add']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <h4>Plano de ação</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        
                        @if(!isset($model->planoAcao))
                        {!! Form::open(['method' => 'POST', 'route' => 'plano-acao.store', 'class' => 'form-horizontal']) !!}
                        @else
                        {!! Form::model($model, ['route' => ['plano-acao.update', $models->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                        @endif


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>