<?php

namespace App\Dto\Task;

use App\Enums\Status;

class TaskStoreDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly Status $status
    ){}
}