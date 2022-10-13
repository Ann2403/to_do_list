<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Requests\Api\V1\RegisterRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User\UseCase\LoginByEmailDTO;
use App\Models\User\UseCase\LoginByEmailHandler;
use App\Models\User\UseCase\RegisterByEmailDTO;
use App\Models\User\UseCase\RegisterByEmailHandler;
use App\Services\WrapFacade\AuthFacade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private readonly RegisterByEmailHandler $registerByEmailHandler,
        private readonly LoginByEmailHandler $loginByEmailHandler,
        private readonly AuthFacade $authFacade,
    ) {
    }

    /**
     * @throws Exception
     */
    public function login(LoginRequest $request): Response
    {
        $dto = new LoginByEmailDTO(
            $request->get('email'),
            $request->get('password'),
        );

        $token = $this->loginByEmailHandler->handler($dto);

        if ($token) {
            return response([
                'user' => new UserResource($this->authFacade->authUser()),
                new TokenResource($token)
            ]);
        }

        return new Response();
    }

    /**
     * @throws Exception
     */
    public function register(RegisterRequest $request): Response
    {
        $dto = new RegisterByEmailDTO(
            $request->get('email'),
            $request->get('password'),
        );

        $this->registerByEmailHandler->handler($dto);
        return response('Ok', 201);
    }

    public function logout(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        return response('Ok', 201);
    }
}
