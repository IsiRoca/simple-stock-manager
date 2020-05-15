@extends('admin.layouts.app')

@section('content')
    <h1>@lang('cities.create')</h1>

    {!! Form::open(['route' => ['admin.cities.store'], 'method' =>'POST']) !!}
        @include('admin/cities/_form')

        {{ link_to_route('admin.cities.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
