<div class="card mb-2">
  @if ($product->hasThumbnail())
    <a href="{{ route('products.show', $product)}}">
      {{ Html::image($product->thumbnail->getUrl('thumb'), $product->thumbnail->name, ['class' => 'card-img-top']) }}
    </a>
  @endif

  <div class="card-body">
    <h4 v-pre class="card-title">
      {{ link_to_route('products.show', $product->title, $product) }}
    </h4>

    <p class="card-text">
      <small class="text-muted">{{ humanize_date($product->posted_at) }}</small><br>
      <small class="text-muted">
        <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $product->comments_count }}
        <i class="fa fa-heart-o ml-2" aria-hidden="true"></i> {{ $product->likes_count }}
      </small>
    </p>
  </div>
</div>
