<?php

namespace App\Action\Task;

use App\Dto\Task\TaskUpdateDto;
use App\Services\TaskService;
use App\Models\Task;

class TaskUpdateAction
{
    public function __construct(
        private TaskService $taskService
    ){}

    public function handle(TaskUpdateDto $dto, int $taskId, int $userId): Task
    {
        return $this->taskService->updateTask($dto, $taskId, $userId);
    }
}