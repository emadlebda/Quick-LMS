@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.questionsOption.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questions-options.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.questionsOption.fields.id') }}
                        </th>
                        <td>
                            {{ $questionsOption->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionsOption.fields.question') }}
                        </th>
                        <td>
                            {{ $questionsOption->question->question ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionsOption.fields.option_text') }}
                        </th>
                        <td>
                            {{ $questionsOption->option_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionsOption.fields.is_correct') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $questionsOption->is_correct ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questions-options.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection