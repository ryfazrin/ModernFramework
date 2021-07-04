<?php
// filename: src/Model/Todo.php

namespace ModernFramework\Model;

use ModernFramework\Util\Database;

class Todo extends Model
{
    const DONE = 1;

    const TODO = 0;

    private $id;

    private $activity;

    private $isDone;

    public function __construct(Database $connection)
    {
        parent::__construct($connection);
    }

    public function getId(): ? int
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = (int) $id;
    }

    public function getActivity(): string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): void
    {
        $this->activity = $activity;
    }

    public function isDone(): bool
    {
        return (bool) $this->isDone;
    }

    public function done(): void
    {
        $this->isDone = self::DONE;
    }

    public function setIsDone(string $done)
    {
        $this->isDone = (int) $done === self::DONE ? self::DONE : self::TODO;
    }
}
