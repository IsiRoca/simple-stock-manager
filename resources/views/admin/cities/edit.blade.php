@extends('admin.layouts.app')

@section('content')
    {!! Form::model($city, ['route' => ['admin.cities.update', $city], 'method' =>'PUT']) !!}
        @include('admin/cities/_form')

        <div class="pull-right">
            {{ link_to_route('admin.cities.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    <div class="pull-left">
    {!! Form::model($city, ['method' => 'DELETE', 'route' => ['admin.cities.destroy', $city], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.cities.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('cities.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
    </div>
@endsection
