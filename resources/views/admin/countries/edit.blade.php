@extends('admin.layouts.app')

@section('content')
    {!! Form::model($country, ['route' => ['admin.countries.update', $country], 'method' =>'PUT']) !!}
        @include('admin/countries/_form')

        <div class="pull-right">
            {{ link_to_route('admin.countries.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    <div class="pull-left">
    {!! Form::model($country, ['method' => 'DELETE', 'route' => ['admin.countries.destroy', $country], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.countries.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('countries.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
    </div>
@endsection
