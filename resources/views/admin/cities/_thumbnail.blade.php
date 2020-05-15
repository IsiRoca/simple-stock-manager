@if ($city->hasThumbnail())
    {{ Html::image($city->thumbnail->getUrl('thumb'), $city->thumbnail->name, ['class' => 'img-thumbnail', 'width' => '350']) }}

    {!! Form::model($city, ['method' => 'DELETE', 'route' => ['admin.cities_thumbnail.destroy', $city], 'data-confirm' => __('forms.cities.delete_thumbnail')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('cities.delete_thumbnail'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endif
