@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lesson.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lessons.update", [$lesson->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="course_id">{{ trans('cruds.lesson.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id">
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $lesson->course->id ?? '') == $id ? 'selected' : '' }}>{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.lesson.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.lesson.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $lesson->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lesson_image">{{ trans('cruds.lesson.fields.lesson_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('lesson_image') ? 'is-invalid' : '' }}" id="lesson_image-dropzone">
                </div>
                @if($errors->has('lesson_image'))
                    <span class="text-danger">{{ $errors->first('lesson_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.lesson_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_text">{{ trans('cruds.lesson.fields.short_text') }}</label>
                <textarea class="form-control {{ $errors->has('short_text') ? 'is-invalid' : '' }}" name="short_text" id="short_text">{{ old('short_text', $lesson->short_text) }}</textarea>
                @if($errors->has('short_text'))
                    <span class="text-danger">{{ $errors->first('short_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.short_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="full_text">{{ trans('cruds.lesson.fields.full_text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('full_text') ? 'is-invalid' : '' }}" name="full_text" id="full_text">{!! old('full_text', $lesson->full_text) !!}</textarea>
                @if($errors->has('full_text'))
                    <span class="text-danger">{{ $errors->first('full_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.full_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position">{{ trans('cruds.lesson.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', $lesson->position) }}" step="1" required>
                @if($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="downloadable_files">{{ trans('cruds.lesson.fields.downloadable_files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('downloadable_files') ? 'is-invalid' : '' }}" id="downloadable_files-dropzone">
                </div>
                @if($errors->has('downloadable_files'))
                    <span class="text-danger">{{ $errors->first('downloadable_files') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.downloadable_files_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_free') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_free" value="0">
                    <input class="form-check-input" type="checkbox" name="is_free" id="is_free" value="1" {{ $lesson->is_free || old('is_free', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_free">{{ trans('cruds.lesson.fields.is_free') }}</label>
                </div>
                @if($errors->has('is_free'))
                    <span class="text-danger">{{ $errors->first('is_free') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.is_free_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_published" value="0">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ $lesson->is_published || old('is_published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">{{ trans('cruds.lesson.fields.is_published') }}</label>
                </div>
                @if($errors->has('is_published'))
                    <span class="text-danger">{{ $errors->first('is_published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.is_published_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.lessonImageDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
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
      $('form').find('input[name="lesson_image"]').remove()
      $('form').append('<input type="hidden" name="lesson_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="lesson_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($lesson) && $lesson->lesson_image)
      var file = {!! json_encode($lesson->lesson_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="lesson_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/lessons/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $lesson->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedDownloadableFilesMap = {}
Dropzone.options.downloadableFilesDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
    maxFilesize: 8, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="downloadable_files[]" value="' + response.name + '">')
      uploadedDownloadableFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDownloadableFilesMap[file.name]
      }
      $('form').find('input[name="downloadable_files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($lesson) && $lesson->downloadable_files)
          var files =
            {!! json_encode($lesson->downloadable_files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="downloadable_files[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection