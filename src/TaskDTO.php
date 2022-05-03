<?php

namespace App;

class TaskDTO
{
    public const STATUS_DONE = 'done';
    public const STATUS_TODO = 'todo';

    private string $text;
    private string $status;

    public function __construct(string $text, string $status)
    {
        $this->text = $text;
        if (!in_array($status, [static::STATUS_DONE, static::STATUS_TODO])) {
            throw new \Exception('Wrong status!');
        }
        $this->status = $status;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
