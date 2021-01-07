<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Repositories\TaskRepository;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\Admin\TaskResource;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    private $task;

    public function __construct(Task $task)
    {
        $this->middleware(['role:isAdmin', 'auth:sanctum']);
        $this->task = new TaskRepository($task);
    }

    public function index()
    {
        $response = [
            'message' => 'successfully retrieved data from database',
            'status' => true,
            'data' => TaskResource::collection($this->task->all())
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(TaskRequest $request)
    {
        $this->task->store($request->all());
        $response = [
            'message' => 'successfully added data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->task->update($request->all(), $task);
        $response = [
            'message' => 'successfully updated data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function delete(Task $task)
    {
        $this->task->delete($task);
        $response = [
            'message' => 'successfully deleted data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function show(Task $task)
    {
        $response = [
            'message' => 'successfully show one data',
            'status' => true,
            'data' => TaskResource::make($this->task->show($task))
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
