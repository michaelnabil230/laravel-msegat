<?php

namespace MichaelNabil230\Msegat\Interfaces;

interface SendingInterface
{
    public function numbers(array $numbers): self;

    public function message(string $message): self;

    public function send(): array;

    public function otp(bool $asArabic = false): array;
}
