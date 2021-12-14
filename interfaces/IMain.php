<?php

/**
 * Define create, read, update, delete interface.
 *
 * @return void
 * @return array
 */

interface Main
{
    public function show(): array;
    public function save(): void;
    public function edit(): void;
    public function delete(): void;
}
