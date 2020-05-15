@extends('admin.layouts.app')

@section('content')
    @include('admin/companies/_thumbnail')

    {!! Form::model($company, ['route' => ['admin.companies.update', $company], 'method' =>'PUT']) !!}
        @include('admin/companies/_form')

        <div class="pull-right">
            {{ link_to_route('admin.companies.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    <div class="pull-left">
    {!! Form::model($company, ['method' => 'DELETE', 'route' => ['admin.companies.destroy', $company], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.products.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('companies.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
    </div>
@endsection
