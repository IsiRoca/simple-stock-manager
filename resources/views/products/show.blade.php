@extends('layouts.app')

@section('content')
  <div class="bg-white p-3 post-card">
    @if ($product->hasThumbnail())
      {{ Html::image($product->thumbnail->getUrl(), $product->thumbnail->name, ['class' => 'card-img-top']) }}
    @endif

    <h1 v-pre>{{ $product->title }}</h1>

    <div class="mb-3">
      <small v-pre class="text-muted">{{ link_to_route('users.show', $product->author->fullname, $product->author) }}</small>,
      <small class="text-muted">{{ humanize_date($product->posted_at) }}</small>
    </div>

    <div v-pre class="post-content">
      {!! $product->content !!}
    </div>

    <p class="mt-3">
      <like
        :likes-count="{{ $product->likes_count }}"
        :liked="{{ json_encode($product->isLiked()) }}"
        :item-id="{{ $product->id }}"
        item-type="products"
        :logged-in="{{ json_encode(Auth::check()) }}"
      />
    </p>
  </div>

  @include ('comments/_list')
@endsection
