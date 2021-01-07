<?php

namespace App\Http\Repositories;

use App\Models\Task;

interface TaskInterface{
    public function all();
    public function store(array $data);
    public function update(array $data, $task);
    public function delete($task);
    public function show($task);
}

class TaskRepository implements TaskInterface {
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
    public function all()
    {
        return $this->task->all();
    }

    public function store(array $data)
    {
        return $this->task->create([
            'cycle_id' => $data['cycle_id'],
            'tool_id' => $data['tool_id'],
            'body' => $data['body']
        ]);
    }

    public function update(array $data, $task)
    {
        return $task->update([
            'cycle_id' => $data['cycle_id'] ?? $task->cycle_id,
            'tool_id' => $data['tool_id'] ?? $task->tool_id,
            'body' => $data['body'] ?? $task->body
        ]);
    }

    public function delete($task)
    {
        return $task->delete();
    }

    public function show($task)
    {
        return $task;
    }
}
