@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-6">
        <h1>@lang('contact.contact_us')</h1>
        {!! Form::open(['route' => 'contactPost', 'role' => 'form', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', __('validation.attributes.name') . ' *', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('email', __('validation.attributes.email') . ' *', ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required', 'maxlength' => 255]) !!}

                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('name', __('contact.contact_fields.company_name'), ['class' => 'control-label']) !!}
                {!! Form::text('company_name', old('company_name'), ['class' => 'form-control' . ($errors->has('company_name') ? ' is-invalid' : ''), 'maxlength' => 255]) !!}

                @error('company_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('phone', __('contact.contact_fields.phone'), ['class' => 'control-label']) !!}
                {!! Form::tel('phone', old('phone'), ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'maxlength' => '20']) !!}

                @error('phone')
                    <span class="invalid-feedback">{{ $message }}</span>

                @enderror
            </div>

            <!-- <div class="form-group">
                {!! Form::label('message', __('contact.contact_fields.message'), ['class' => 'control-label']) !!}
                {!! Form::textarea('message', old('message'), ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'style' => 'height: 10em', 'maxlength' => '255']) !!}
            </div> -->

            <div class="form-group">
                {!! Form::submit(__('contact.submit'), ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection

