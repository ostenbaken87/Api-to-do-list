<?php

namespace App\Action\Task;

use App\Dto\Task\TaskStoreDto;
use App\Services\TaskService;
use App\Models\Task;

class TaskStoreAction
{
    public function __construct(
        private TaskService $taskService,
    ){}

    public function handle(TaskStoreDto $dto, int $userId): Task
    {
        return $this->taskService->createTask($dto, $userId);
    }
}