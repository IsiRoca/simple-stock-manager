<div class="card">
  @if ($product->hasThumbnail())
    <a href="{{ route('products.show', $product)}}">
      {{ Html::image($product->thumbnail->getUrl('thumb'), $product->thumbnail->name, ['class' => 'card-img-top']) }}
    </a>
  @endif

  <div class="card-body">
    <h4 v-pre class="card-title">{{ link_to_route('products.show', $product->title, $product) }}</h4>

    <p class="card-text"><small v-pre class="text-muted">{{ link_to_route('users.show', $product->author->fullname, $product->author) }}</small></p>

    <p class="card-text">
      <small class="text-muted">{{ humanize_date($product->posted_at) }}</small><br>
      <small class="text-muted">
        <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $product->comments_count }}
        <like
          :likes-count="{{ $product->likes_count }}"
          :liked="{{ json_encode($product->isLiked()) }}"
          :item-id="{{ $product->id }}"
          item-type="products"
          :logged-in="{{ json_encode(Auth::check()) }}"
        />
      </small>
    </p>
  </div>
</div>
