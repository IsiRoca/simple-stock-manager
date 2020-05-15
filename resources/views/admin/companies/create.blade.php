@extends('admin.layouts.app')

@section('content')
    <h1>@lang('companies.create')</h1>

    {!! Form::open(['route' => ['admin.companies.store'], 'method' =>'POST']) !!}
        @include('admin/companies/_form')

        {{ link_to_route('admin.companies.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
