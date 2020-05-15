@extends('layouts.app')

@section('content')

  @include ('products/_search_form')

  <div class="d-flex justify-content-between">
    <div class="p-2">
      @if (request()->has('q'))
        <h2>{{ trans_choice('products.search_results', $products->count(), ['query' => request()->input('q')]) }}</h2>
      @else
        <h2>@lang('products.last_products')</h2>
      @endif
    </div>

    <div class="p-2">
      <a href="{{ route('products.feed') }}" class="pull-right" data-turbolinks="false">
          <i class="fa fa-rss" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  @include ('products/_list')
@endsection
