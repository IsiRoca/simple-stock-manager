@if ($company->hasThumbnail())
    {{ Html::image($company->thumbnail->getUrl('thumb'), $company->thumbnail->name, ['class' => 'img-thumbnail', 'width' => '350']) }}

    {!! Form::model($company, ['method' => 'DELETE', 'route' => ['admin.companies_thumbnail.destroy', $company], 'data-confirm' => __('forms.companies.delete_thumbnail')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('companies.delete_thumbnail'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endif
