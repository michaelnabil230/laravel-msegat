<?php

namespace MichaelNabil230\Msegat\Interfaces;

interface CalculateInterface
{
    public function numbers(array $numbers): self;

    public function message(string $message): self;

    public function get(): array;
}
