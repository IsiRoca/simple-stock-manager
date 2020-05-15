@extends('admin.layouts.app')

@section('content')
    @include('admin/products/_thumbnail')

    {!! Form::model($product, ['route' => ['admin.products.update', $product], 'method' =>'PUT']) !!}
        @include('admin/products/_form')

        <div class="pull-right">
            {{ link_to_route('admin.products.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    <div class="pull-left">
    {!! Form::model($product, ['method' => 'DELETE', 'route' => ['admin.products.destroy', $product], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.products.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('products.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
    </div>
@endsection
