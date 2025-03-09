<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Post\Domain\Services\PostService;
use Modules\Post\Http\Requests\ListPostRequest;

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
}
