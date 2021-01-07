<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Tool;
use App\Http\Controllers\Controller;
use App\Http\Repositories\ToolRepository;
use App\Http\Requests\ToolRequest;
use App\Http\Resources\Admin\ToolResource;
use Symfony\Component\HttpFoundation\Response;

class ToolController extends Controller
{
    private $tool;

    public function __construct(Tool $tool)
    {
        $this->middleware(['role:isAdmin', 'auth:sanctum']);
        $this->tool = new ToolRepository($tool);
    }

    public function index()
    {
        $response = [
            'message' => 'successfully retrieved data from database',
            'status' => true,
            'data' => ToolResource::collection($this->tool->all())
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(ToolRequest $request)
    {
        $this->tool->store($request->all());
        $response = [
            'message' => 'successfully added data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function update(ToolRequest $request, Tool $tool)
    {
        $this->tool->update($request->all(), $tool);
        $response = [
            'message' => 'successfully updated data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function delete(Tool $tool)
    {

        $this->tool->delete($tool);
        $response = [
            'message' => 'successfully deleted data',
            'status' => true,
            'data' => (object)[]
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function show(Tool $tool)
    {
        $response = [
            'message' => 'successfully show one data',
            'status' => true,
            'data' => ToolResource::make($this->tool->show($tool))
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
