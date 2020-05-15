@extends('layouts.rss')

@section('content')
    @each('products_feed/_show', $products, 'product')
@endsection
