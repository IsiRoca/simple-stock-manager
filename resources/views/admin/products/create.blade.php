@extends('admin.layouts.app')

@section('content')
    <h1>@lang('products.create')</h1>

    {!! Form::open(['route' => ['admin.products.store'], 'method' =>'POST']) !!}
        @include('admin/products/_form')

        {{ link_to_route('admin.products.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
