@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.questionsOption.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions-options.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="question_id">{{ trans('cruds.questionsOption.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id">
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.questionsOption.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="option_text">{{ trans('cruds.questionsOption.fields.option_text') }}</label>
                <textarea class="form-control {{ $errors->has('option_text') ? 'is-invalid' : '' }}" name="option_text" id="option_text" required>{{ old('option_text') }}</textarea>
                @if($errors->has('option_text'))
                    <span class="text-danger">{{ $errors->first('option_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.questionsOption.fields.option_text_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_correct') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_correct" id="is_correct" value="1" required {{ old('is_correct', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_correct">{{ trans('cruds.questionsOption.fields.is_correct') }}</label>
                </div>
                @if($errors->has('is_correct'))
                    <span class="text-danger">{{ $errors->first('is_correct') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.questionsOption.fields.is_correct_helper') }}</span>
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