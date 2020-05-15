@extends('admin.layouts.app')

@section('content')
    <h1>@lang('countries.create')</h1>

    {!! Form::open(['route' => ['admin.countries.store'], 'method' =>'POST']) !!}
        @include('admin/countries/_form')

        {{ link_to_route('admin.countries.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
