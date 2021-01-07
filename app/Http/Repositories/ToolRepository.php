<?php

namespace App\Http\Repositories;

use App\Models\Tool;
use Illuminate\Support\Str;

interface ToolInterface {
    public function all();
    public function store(array $data);
    public function update(array $data, $tool);
    public function delete($tool);
    public function show($tool);
}

class ToolRepository implements ToolInterface {

    protected $tool;

    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
    }

    public function all()
    {
        return $this->tool->all();
    }

    public function store(array $data)
    {
        $this->tool->create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']). '-'. Str::random(10),
            'image' => $this->uploadImage($data['image'])
        ]);
        return true;
    }

    public function update(array $data, $tool)
    {
        $tool->update([
            'name' => $data['name'] ?? $tool->name,
            //'slug' => Str::slug($data['name']). '-'. Str::random(10) ?? $tool->slug,
            'image' => $this->uploadImage($data['image']) ?? $tool->image
        ]);
        return true;
    }

    public function delete($tool)
    {
        return $tool->delete();
    }

    public function show($tool)
    {
        return $tool;
    }

    private function uploadImage($image)
    {
        return cloudinary()->upload($image->getRealPath(),
        ["folder" => "room", "overwrite" => TRUE, "resource_type" => "image"])
        ->getSecurePath();
    }

}
