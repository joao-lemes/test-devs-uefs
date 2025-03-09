<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Tag\Domain\Services\TagService;
use Modules\Tag\Http\Requests\DeleteTagRequest;
use Modules\Tag\Http\Requests\GetTagRequest;
use Modules\Tag\Http\Requests\ListTagRequest;
use Modules\Tag\Http\Requests\StoreTagRequest;
use Modules\Tag\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    public function __construct(private readonly TagService $tagService)
    {
    }

    public function listAction(ListTagRequest $request): JsonResponse
    {
        $output = $this->tagService->list(
            $request->get('page') ?? 1,
            $request->get('per_page') ?? 10
        );

        return response()->json($output, JsonResponse::HTTP_OK);
    }

    public function storeAction(StoreTagRequest $request): JsonResponse
    {
        $output = $this->tagService->store(
            $request->get('name')
        );

        return response()->json($output, JsonResponse::HTTP_CREATED);
    }

    public function getAction(GetTagRequest $request): JsonResponse
    {
        $output = $this->tagService->getByUuid($request->id);

        return response()->json($output, JsonResponse::HTTP_OK);
    }

    public function updateAction(UpdateTagRequest $request): JsonResponse
    {
        $output = $this->tagService->update(
            $request->id,
            $request->get('name')
        );

        return response()->json($output, JsonResponse::HTTP_OK);
    }

    public function deleteAction(DeleteTagRequest $request): JsonResponse
    {
        $this->tagService->delete(
            $request->id,
        );

        return response()->json([], JsonResponse::HTTP_NO_CONTENT);
    }
}
