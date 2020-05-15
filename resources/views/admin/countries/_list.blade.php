<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('countries.count', $countries->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('countries.attributes.name')</th>
            <th>@lang('countries.attributes.iso_alpha_2')</th>
            <th>@lang('countries.attributes.iso_alpha_3')</th>
            <th>@lang('countries.attributes.iso_numeric')</th>
            <th>@lang('countries.attributes.international_phone')</th>
            <th>@lang('countries.attributes.visible')</th>
            <th>@lang('countries.attributes.updated_at')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{ $country->name }}</td>
                <td>{{ $country->iso_alpha_2 }}</td>
                <td>{{ $country->iso_alpha_3 }}</td>
                <td>{{ $country->iso_numeric }}</td>
                <td>{{ $country->international_phone }}</td>
                <td>{{ $country->visible }}</td>
                <td>{{ humanize_date($country->updated_at, 'd/m/Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('admin.countries.edit', $country) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    {!! Form::model($country, ['method' => 'DELETE', 'route' => ['admin.countries.destroy', $country], 'class' => 'form-inline', 'data-confirm' => __('forms.countries.delete')]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $countries->links() }}
</div>
