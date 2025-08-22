<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Action\Task\TaskStoreAction;
use App\Action\Task\TaskUpdateAction;
use App\Http\Resources\Task\TaskResource;
use App\Http\Resources\Task\TaskCollection;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        private TaskService $service
    ) {}

    public function index(): TaskCollection
    {
        $tasks = $this->service->getAllTasks();
        return new TaskCollection($tasks);
    }

    public function store(
        TaskStoreRequest $request,
        TaskStoreAction $action
    ): TaskResource {
        $dto = $request->toDto();
        $task = $action->handle($dto, $request->user()->id);
        return new TaskResource($task);
    }

    public function show($id): TaskResource
    {
        $task = $this->service->getTaskById($id);
        return new TaskResource($task);
    }

    public function usersTasks(int $userId): TaskCollection{
        $tasks = $this->service->getTasksByUserId($userId);
        return new TaskCollection($tasks);
    }

    public function update(
        TaskUpdateRequest $request,
        TaskUpdateAction $action,
        int $id
    ): TaskResource {
        $dto = $request->toDto();
        $task = $action->handle($dto, $id, $request->user()->id);
        return new TaskResource($task);
    }

    public function destroy(Request $request, int $id)
    {
        $task = $this->service->getTaskByUser($id, $request->user()->id);
        $this->service->deleteTask($task);

        return response()->json([
            'message' => 'Task deleted successfully',
        ], 200);
    }
}
