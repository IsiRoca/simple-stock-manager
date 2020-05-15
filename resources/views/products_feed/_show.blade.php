<item>
    <title>{{ $product->title }}</title>
    <guid>{{ route('products.show', $product) }}</guid>
    <pubDate>{{ $product->posted_at->format('r') }}</pubDate>
    <author>{{ $product->author->email }} ({{ $product->author->fullname }})</author>
    <description>{{ $product->excerpt() }}</description>
</item>
