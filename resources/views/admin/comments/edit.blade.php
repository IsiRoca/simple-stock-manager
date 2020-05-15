@extends('admin.layouts.app')

@section('content')
    <p>@lang('products.show') : {{ link_to_route('products.show', route('products.show', $comment->product), $comment->product) }}</p>
    @include('admin/comments/_form')
@endsection
