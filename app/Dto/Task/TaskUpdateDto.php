<?php

namespace App\Dto\Task;

use App\Enums\Status;

class TaskUpdateDto
{
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?Status $status = null,
    ) {}
}
