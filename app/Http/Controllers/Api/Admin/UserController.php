<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Resources\Admin\UserResource;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->middleware(['role:isAdmin', 'auth:sanctum']);
        $this->user = new UserRepository($user);
    }

    public function index()
    {
        $response = [
            'message' => 'successfully retrieved data from database',
            'status' => true,
            'data' => UserResource::collection($this->user->all())
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(UserRequest $request)
    {
        $this->user->store($request->all());
        $response = [
            'message' => 'successfully added data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->user->update($request->all(), $user);
        $response = [
            'message' => 'successfully updated data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function delete(User $user)
    {
        $this->user->delete($user);
        $response = [
            'message' => 'successfully deleted data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function show(User $user)
    {
        $response = [
            'message' => 'successfully show one data',
            'status' => true,
            'data' => UserResource::make($this->user->show($user)),
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
