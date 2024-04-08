<?php

namespace MichaelNabil230\Msegat\Traits;

trait HasMessage
{
    /**
     * The numbers to be sent.
     */
    protected string $message;

    /**
     * Text message to be sent.
     */
    public function message(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
