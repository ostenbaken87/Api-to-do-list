<?php

namespace App\Services;

use App\Models\Task;
use App\Dto\Task\TaskStoreDto;
use App\Dto\Task\TaskUpdateDto;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Task\TaskRepositoryInterface;

class TaskService
{
    public function __construct(private TaskRepositoryInterface $repository){}

    public function getAllTasks(): Collection
    {
        return $this->repository->all();
    }

    public function getTasksByUserId(int $userId): Collection
    {
        return $this->repository->getAllByUserId($userId);
    }

    public function getTaskByUser(int $taskId, int $userId): Task
    {
        return $this->repository->findByUser($taskId, $userId);
    }

    public function getTaskById($taskId): Task
    {
        return $this->repository->find($taskId);
    }

    public function createTask(TaskStoreDto $dto, int $userId): Task
    {
        return $this->repository->create([
            "user_id"=> $userId,
            "title" => $dto->title,
            "description" => $dto->description,
            "status" => $dto->status,
        ]);
    }

    public function updateTask(TaskUpdateDto $dto, int $taskId, int $userId): Task
    {
        $task = $this->repository->findByUser($taskId, $userId);
        
        $updateData = array_filter([
            "title" => $dto->title,
            "description" => $dto->description,
            "status" => $dto->status
        ], function($value) {
            return !is_null($value);
        });

        return $this->repository->update($task, $updateData);
    }

    public function deleteTask(Task $task): void
    {
        $this->repository->delete($task);
    }
}