@extends('admin.layouts.app')

@section('content')
    <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.cities')</h1>
      <a href="{{ route('admin.cities.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
      </a>
    </div>

    @include ('admin/cities/_list')
@endsection
