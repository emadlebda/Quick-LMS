<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionsOptionRequest;
use App\Http\Requests\UpdateQuestionsOptionRequest;
use App\Http\Resources\Admin\QuestionsOptionResource;
use App\Models\QuestionsOption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsOptionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questions_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionsOptionResource(QuestionsOption::with(['question'])->get());
    }

    public function store(StoreQuestionsOptionRequest $request)
    {
        $questionsOption = QuestionsOption::create($request->all());

        return (new QuestionsOptionResource($questionsOption))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QuestionsOption $questionsOption)
    {
        abort_if(Gate::denies('questions_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionsOptionResource($questionsOption->load(['question']));
    }

    public function update(UpdateQuestionsOptionRequest $request, QuestionsOption $questionsOption)
    {
        $questionsOption->update($request->all());

        return (new QuestionsOptionResource($questionsOption))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QuestionsOption $questionsOption)
    {
        abort_if(Gate::denies('questions_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsOption->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
