<?php

namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function all(): Collection
    {
        return Task::all();
    }

    public function getAllByUserId(int $userId): Collection
    {
        return Task::where("user_id", $userId)->get();
    }

    public function find(int $id): Task|null
    {
        return Task::find($id);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data): Task
    {
        $task->update($data);
        return $task->fresh();
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }

    public function findByUser(int $id, int $userId): Task|null
    {
        return Task::where('id', $id)
                   ->where('user_id', $userId)
                   ->firstOrFail();
    }
}