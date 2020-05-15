<div class="form-group">
    {!! Form::label('name', __('countries.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

    @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-row">

</div>

<div class="form-group">
    {!! Form::label('content', __('countries.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required']) !!}

    @error('content')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
