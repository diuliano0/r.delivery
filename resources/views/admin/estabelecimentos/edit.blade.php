@extends('admin.base.template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_estabelecimentos_edit', $entity) !!}
@endsection
@section('content')
    {!! Form::Model($entity,['route'=>['admin.estabelecimentos.update',$entity->id], 'files'=>true]) !!}
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Preencher formulário abaixo</h3>
        </div>
        <div class="box-body">
            @include('admin.base.errors')
            @include('admin.estabelecimentos._form')
        </div>
        <div class="box-footer">
            <button class="btn btn-warning btn-flat pull-right">
                <i class="fa fa-times"></i> Cancelar
            </button>
            <button class="btn btn-primary btn-flat">
                <i class="fa fa-btn fa-floppy-o"></i> Salvar Registro
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection