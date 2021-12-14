<?php

interface Main
{
    public function show(): array;
    public function save(): void;
    public function edit(): void;
    public function delete(): void;
}
