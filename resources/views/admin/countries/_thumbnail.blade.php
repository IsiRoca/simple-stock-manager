@if ($country->hasThumbnail())
    {{ Html::image($country->thumbnail->getUrl('thumb'), $country->thumbnail->name, ['class' => 'img-thumbnail', 'width' => '350']) }}

    {!! Form::model($country, ['method' => 'DELETE', 'route' => ['admin.countries_thumbnail.destroy', $country], 'data-confirm' => __('forms.countries.delete_thumbnail')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('countries.delete_thumbnail'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endif
