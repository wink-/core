@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.process.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.processes.update", [$process->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.process.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $process->code) }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.process.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.process.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $process->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.process.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minimum_lot_charge">{{ trans('cruds.process.fields.minimum_lot_charge') }}</label>
                <input class="form-control {{ $errors->has('minimum_lot_charge') ? 'is-invalid' : '' }}" type="number" name="minimum_lot_charge" id="minimum_lot_charge" value="{{ old('minimum_lot_charge', $process->minimum_lot_charge) }}" step="0.01">
                @if($errors->has('minimum_lot_charge'))
                    <div class="invalid-feedback">
                        {{ $errors->first('minimum_lot_charge') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.process.fields.minimum_lot_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('compliant_rohs') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="compliant_rohs" value="0">
                    <input class="form-check-input" type="checkbox" name="compliant_rohs" id="compliant_rohs" value="1" {{ $process->compliant_rohs || old('compliant_rohs', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="compliant_rohs">{{ trans('cruds.process.fields.compliant_rohs') }}</label>
                </div>
                @if($errors->has('compliant_rohs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('compliant_rohs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.process.fields.compliant_rohs_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('compliant_reach') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="compliant_reach" value="0">
                    <input class="form-check-input" type="checkbox" name="compliant_reach" id="compliant_reach" value="1" {{ $process->compliant_reach || old('compliant_reach', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="compliant_reach">{{ trans('cruds.process.fields.compliant_reach') }}</label>
                </div>
                @if($errors->has('compliant_reach'))
                    <div class="invalid-feedback">
                        {{ $errors->first('compliant_reach') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.process.fields.compliant_reach_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('archive') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="archive" value="0">
                    <input class="form-check-input" type="checkbox" name="archive" id="archive" value="1" {{ $process->archive || old('archive', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="archive">{{ trans('cruds.process.fields.archive') }}</label>
                </div>
                @if($errors->has('archive'))
                    <div class="invalid-feedback">
                        {{ $errors->first('archive') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.process.fields.archive_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="revision">{{ trans('cruds.process.fields.revision') }}</label>
                <input class="form-control {{ $errors->has('revision') ? 'is-invalid' : '' }}" type="number" name="revision" id="revision" value="{{ old('revision', $process->revision) }}" step="1">
                @if($errors->has('revision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('revision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.process.fields.revision_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection