<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('cities.count', $cities->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('cities.attributes.name')</th>
            <th>@lang('cities.attributes.description')</th>
            <th>@lang('cities.attributes.country_name')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $city->description }}</td>
                <td>{{ link_to_route('admin.countries.edit', $city->country['name'], $city->country['id']) }}</td>
                <td>
                    <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    {!! Form::model($city, ['method' => 'DELETE', 'route' => ['admin.cities.destroy', $city], 'class' => 'form-inline', 'data-confirm' => __('forms.cities.delete')]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $cities->links() }}
</div>
