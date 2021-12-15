<?php

/**
 * Abstract class for CRUD Controller .
 */

abstract class Controller
{
    abstract public function getAll(): array;
    abstract public function getById(int $id): array;
    abstract public function save(): void;
    abstract public function update(int $id): void;
    abstract public function delete(int $id): void;
}
