<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Post\Domain\Services\PostService;
use Modules\Post\Http\Requests\DeletePostRequest;
use Modules\Post\Http\Requests\GetPostRequest;
use Modules\Post\Http\Requests\ListPostRequest;
use Modules\Post\Http\Requests\StorePostRequest;
use Modules\Post\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function __construct(private readonly PostService $postService)
    {
    }

    public function listAction(ListPostRequest $request): JsonResponse
    {
        $output = $this->postService->list(
            $request->get('page') ?? 1,
            $request->get('per_page') ?? 10
        );

        return response()->json($output, JsonResponse::HTTP_OK);
    }

    public function storeAction(StorePostRequest $request): JsonResponse
    {
        $output = $this->postService->store(
            $request->get('body'),
            $request->get('tags') ?? [],
        );

        return response()->json($output, JsonResponse::HTTP_CREATED);
    }

    public function getAction(GetPostRequest $request): JsonResponse
    {
        $output = $this->postService->getByUuid($request->id);

        return response()->json($output, JsonResponse::HTTP_OK);
    }

    public function updateAction(UpdatePostRequest $request): JsonResponse
    {
        $output = $this->postService->update(
            $request->id,
            $request->get('body'),
            $request->get('tags'),
        );

        return response()->json($output, JsonResponse::HTTP_OK);
    }

    public function deleteAction(DeletePostRequest $request): JsonResponse
    {
        $this->postService->delete(
            $request->id,
        );

        return response()->json([], JsonResponse::HTTP_NO_CONTENT);
    }
}
