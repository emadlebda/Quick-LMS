@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="question">{{ trans('cruds.question.fields.question') }}</label>
                    <textarea class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question"
                              id="question" required>{{ old('question') }}</textarea>
                    @if($errors->has('question'))
                        <span class="text-danger">{{ $errors->first('question') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="question_image">{{ trans('cruds.question.fields.question_image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('question_image') ? 'is-invalid' : '' }}"
                         id="question_image-dropzone">
                    </div>
                    @if($errors->has('question_image'))
                        <span class="text-danger">{{ $errors->first('question_image') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.question.fields.question_image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="score">{{ trans('cruds.question.fields.score') }}</label>
                    <input class="form-control {{ $errors->has('score') ? 'is-invalid' : '' }}" type="number"
                           name="score" id="score" value="{{ old('score', '1') }}" step="1" required>
                    @if($errors->has('score'))
                        <span class="text-danger">{{ $errors->first('score') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.question.fields.score_helper') }}</span>
                </div>


                <div class="form-group">
                    <label for="questions">{{ trans('cruds.test.title_singular') }}</label>
                    <select class="form-control select2 {{ $errors->has('tests') ? 'is-invalid' : '' }}" name="tests[]" id="tests" multiple>
                        @foreach($tests as $id => $test)
                            <option value="{{ $id }}" {{ in_array($id, old('tests', [])) ? 'selected' : '' }}>{{ $test }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tests'))
                        <span class="text-danger">{{ $errors->first('tests') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.test.fields.questions_helper') }}</span>
                </div>




                @for($q =1;$q<=4;$q++)
                    <div class="card">
                        <div class="card-body">
                                <div class="form-group">
                                    <label class="required"
                                           for="option_text_{{ $q }}">{{ trans('cruds.questionsOption.fields.option_text') .' '. $q}}</label>
                                    <textarea class="form-control {{ $errors->has('option_text_'.$q) ? 'is-invalid' : '' }}"
                                              name="option_text_{{ $q }}" id="option_text_{{ $q }}"
                                              required>{{ old('option_text_'.$q) }}</textarea>
                                    @if($errors->has('option_text_'. $q ))
                                        <span class="text-danger">{{ $errors->first('option_text_'). $q }}</span>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.questionsOption.fields.option_text_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <div class="form-check {{ $errors->has('is_correct').$q ? 'is-invalid' : '' }}">
                                        <input class="form-check-input" type="checkbox" name="is_correct_{{$q}}"
                                               id="is_correct_{{$q}}"
                                               value="1"  {{ old('is_correct_'.$q, 0) == 1 ? 'checked' : '' }}>
                                        <label class="required form-check-label"
                                               for="is_correct_{{$q}}">{{ trans('cruds.questionsOption.fields.is_correct') }}</label>
                                    </div>
                                    @if($errors->has('is_correct'.$q))
                                        <span class="text-danger">{{ $errors->first('is_correct'.$q) }}</span>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.questionsOption.fields.is_correct_helper') }}</span>
                                </div>
                        </div>
                    </div>
                @endfor



                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.questionImageDropzone = {
            url: '{{ route('admin.questions.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="question_image"]').remove();
                $('form').append('<input type="hidden" name="question_image" value="' + response.name + '">');
            },
            removedfile: function (file) {
                file.previewElement.remove();
                if (file.status !== 'error') {
                    $('form').find('input[name="question_image"]').remove();
                    this.options.maxFiles = this.options.maxFiles + 1;
                }
            },
            init: function () {
                @if(isset($question) && $question->question_image)
                var file = {!! json_encode($question->question_image) !!}
                    this.options.addedfile.call(this, file);
                this.options.thumbnail.call(this, file, file.preview);
                file.previewElement.classList.add('dz-complete');
                $('form').append('<input type="hidden" name="question_image" value="' + file.file_name + '">');
                this.options.maxFiles = this.options.maxFiles - 1;
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response; //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file;
                }
                file.previewElement.classList.add('dz-error');
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]');
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }

                return _results;
            }
        };
    </script>
@endsection
