@if ($product->hasThumbnail())
    {{ Html::image($product->thumbnail->getUrl('thumb'), $product->thumbnail->name, ['class' => 'img-thumbnail', 'width' => '350']) }}

    {!! Form::model($product, ['method' => 'DELETE', 'route' => ['admin.products_thumbnail.destroy', $product], 'data-confirm' => __('forms.products.delete_thumbnail')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('products.delete_thumbnail'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endif
