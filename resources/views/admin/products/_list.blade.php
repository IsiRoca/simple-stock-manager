<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('products.count', $products->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('products.attributes.title')</th>
            <th>@lang('products.attributes.author')</th>
            <th>@lang('products.attributes.posted_at')</th>
            <th><i class="fa fa-comments" aria-hidden="true"></i></th>
            <th><i class="fa fa-heart" aria-hidden="true"></i></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ link_to_route('admin.users.edit', $product->author->fullname, $product->author) }}</td>
                <td>{{ humanize_date($product->posted_at, 'd/m/Y H:i:s') }}</td>
                <td><span class="badge badge-pill badge-secondary">{{ $product->comments_count }}</span></td>
                <td><span class="badge badge-pill badge-secondary">{{ $product->likes_count }}</span></td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    {!! Form::model($product, ['method' => 'DELETE', 'route' => ['admin.products.destroy', $product], 'class' => 'form-inline', 'data-confirm' => __('forms.products.delete')]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
