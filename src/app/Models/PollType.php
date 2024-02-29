<?php

namespace app\Models;

use core\PDO;

class PollType
{
    const string TABLE_NAME = 'poll_types';

    protected array $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /*
     * Setters
     */
    public function setName(string $name): PollType
    {
        $this->attributes['name'] = $name;

        return $this;
    }

    /*
     * Static queries
     */

    public static function all(): array
    {
        return array_map(
            fn($item) => new PollType($item),
            PDO::init()->query("SELECT * FROM " . self::TABLE_NAME)->fetchAll()
        );
    }

    public static function find(int $id): PollType
    {
        $stmt = PDO::init()->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch();

        return new PollType($data);
    }

    /*
     * Mutated model queries
     */
    public function update(array $updatedAttibutes = []): PollType
    {
        $this->attributes = array_merge($this->attributes, $updatedAttibutes);

        $stmt = PDO::init()->prepare("UPDATE " . self::TABLE_NAME . " SET name=:name WHERE id=:id");
        $stmt->execute($this->attributes);
        $data = $stmt->fetch();

        return $this;
    }
}