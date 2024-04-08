<?php

namespace MichaelNabil230\Msegat\Traits;

trait HasNumbers
{
    /**
     * The numbers to send SMS.
     */
    protected string $numbers;

    /**
     * Bulk of numbers to send SMS.
     */
    public function numbers(array|string $numbers): static
    {
        $this->numbers = collect(is_array($numbers) ? $numbers : func_get_args())
            ->map(fn ($number) => str($number)->replace(['00', '+'], ''))
            ->implode(',');

        return $this;
    }
}
