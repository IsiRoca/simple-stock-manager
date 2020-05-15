<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('companies.count', $companies->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('companies.attributes.name')</th>
            <th>@lang('companies.attributes.author')</th>
            <th>@lang('companies.attributes.posted_at')</th>
            <th><i class="fa fa-comments" aria-hidden="true"></i></th>
            <th><i class="fa fa-heart" aria-hidden="true"></i></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ link_to_route('admin.users.edit', $company->author->fullname, $company->author) }}</td>
                <td>{{ humanize_date($company->posted_at, 'd/m/Y H:i:s') }}</td>
                <td><span class="badge badge-pill badge-secondary">{{ $company->comments_count }}</span></td>
                <td><span class="badge badge-pill badge-secondary">{{ $company->likes_count }}</span></td>
                <td>
                    <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    {!! Form::model($company, ['method' => 'DELETE', 'route' => ['admin.companies.destroy', $company], 'class' => 'form-inline', 'data-confirm' => __('forms.companies.delete')]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $companies->links() }}
</div>
