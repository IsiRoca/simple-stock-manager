<h1>@lang('newsletter.email.welcome')</h1>

<p>
    @lang('newsletter.email.description', ['count' => $products->count()]) :
</p>

<ul>
    @foreach($products as $product)
        <li>{{ link_to_route('products.show', $product->title, $product) }}</li>
    @endforeach
</ul>

<p>
    @lang('newsletter.email.thanks')
</p>

<p>
    {{ link_to_route('newsletter-subscriptions.unsubscribe', __('newsletter.email.unsubscribe'), ['email' => $email]) }}
</p>
