<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Tag\Domain\Services\TagService;
use Modules\Tag\Http\Requests\ListTagRequest;
use Modules\Tag\Http\Requests\StoreTagRequest;

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
}
