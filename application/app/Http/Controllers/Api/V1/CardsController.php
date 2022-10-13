<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CardCreateRequest;
use App\Http\Requests\Api\V1\CardUpdateRequest;
use App\Models\Card\Entity\Id;
use App\Models\Card\UseCase\CreateDTO;
use App\Models\Card\UseCase\CreateHandler;
use App\Models\Card\UseCase\DeleteHandler;
use App\Models\Card\UseCase\UpdateDTO;
use App\Models\Card\UseCase\UpdateHandler;
use App\ReadModel\Card\CardQueryBuilderReadeModel;
use App\Services\WrapFacade\AuthFacade;
use Exception;
use Illuminate\Http\Response;

class CardsController extends Controller
{
    public function __construct(
        private readonly AuthFacade $authFacade,
        private readonly CardQueryBuilderReadeModel $cardReadeModel,
        private readonly CreateHandler $createHandler,
        private readonly UpdateHandler $updateHandler,
        private readonly DeleteHandler $deleteHandler,
    ) {
    }

    public function index(): Response
    {
        $user = $this->authFacade->authUser();
        $cards = $this->cardReadeModel->findForUserId($user->getId());

        return response(['cards' => $cards]);
    }

    public function show(int $id): Response
    {
        $service = $this->cardReadeModel->findById(new Id($id));
        return response(['service' => $service]);
    }

    /**
     * @throws Exception
     */
    public function create(CardCreateRequest $request): Response
    {
        $dto = new CreateDTO(
            $request->get('text'),
        );

        $this->createHandler->handler($dto);
        return response('Ok', 201);
    }

    /**
     * @throws Exception
     */
    public function update(CardUpdateRequest $request, int $id): Response
    {
        $dto = new UpdateDTO(
            $id,
            $request->get('text'),
            (int)$request->get('done'),
        );

        $this->updateHandler->handler($dto);
        return response('Ok', 200);
    }

    /**
     * @throws Exception
     */
    public function delete(int $id): Response
    {
        $this->deleteHandler->handler(new Id($id));
        return response('No Content', 204);
    }
}
