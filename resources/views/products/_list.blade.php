<div class="card-columns">
    @each('products/_show', $products, 'product', 'products/_empty')
</div>

<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
