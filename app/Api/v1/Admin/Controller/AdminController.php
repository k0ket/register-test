<?php

declare(strict_types=1);

namespace App\Api\v1\Admin\Controller;

use App\Api\v1\Admin\Resource\AccountResource;
use App\Api\v1\Admin\Resource\LinksResource;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    /**
     * @var \App\Repositories\Interfaces\ClientRepositoryInterface
     */
    private ClientRepositoryInterface $userRepository;

    /**
     * @param \App\Repositories\Interfaces\ClientRepositoryInterface $userRepository
     */
    public function __construct(ClientRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function account(Request $request): JsonResponse
    {
        $sort     = $request->input('sort');
        $sortBy   = $request->input('sortBy');
        $filter   = $request->input('filter');
        $filterBy = $request->input('filterBy');

        $accounts = $this->userRepository->getAccounts($sort, $sortBy, $filter, $filterBy);
        $result   = new AccountResource($accounts);

        return Response::JSON(
            [
                'data'  => $result,
                'links' => $result->getLinks(),
                'meta'  => $result->getMeta(),
            ]
        );
    }
}
