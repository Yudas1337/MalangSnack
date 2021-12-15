<?php

/**
 * Define create, read, update, delete interface.
 *
 * @return void
 * @return array
 */

interface IMain
{
    public function show(): array;
    public function save(): void;
    public function edit(int $id): void;
    public function delete(int $id): void;
    public function getById(int $id): array;
}
