<?php

namespace app\Models;

use core\PDO;

class PollTypeQuestion
{
    public array $attributes = [];

    public function fill(array $attributes): PollTypeQuestion
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function create(): bool
    {
        $stmt = PDO::init()->prepare("INSERT INTO poll_type_questions (question, poll_type_id) VALUES (:question, :poll_type_id)");

        return $stmt->execute($this->attributes);
    }

    public function update(): bool
    {
        $stmt = PDO::init()->prepare("UPDATE poll_type_questions SET question=:question, poll_type_id=:poll_type_id WHERE id=:id");

        return $stmt->execute($this->attributes);
    }

    public static function delete(int $id): bool
    {
        $stmt = PDO::init()->prepare("DELETE FROM poll_type_questions WHERE id=:id");

        return $stmt->execute(['id' => $id]);
    }

    /*
     * Static methods
     */

    public static function make(): PollTypeQuestion
    {
        return new static();
    }

    public static function all(): array
    {
        return array_map(
            fn($item) => self::make()->fill($item),
            PDO::init()->query('SELECT * FROM poll_type_questions')->fetchAll()
        );
    }

    public static function wherePollTypeId(int $pollTypeId): array
    {
        return array_map(
            fn($item) => self::make()->fill($item),
            PDO::init()->query('SELECT * FROM poll_type_questions WHERE poll_type_id=' . $pollTypeId)->fetchAll()
        );
    }

    public static function find(int $id): PollTypeQuestion
    {
        $stmt = PDO::init()->prepare('SELECT * FROM poll_type_questions WHERE id = :id');
        $stmt->execute(['id' => $id]);

        return self::make()->fill($stmt->fetch());
    }
}