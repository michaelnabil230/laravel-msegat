<?php

namespace MichaelNabil230\Msegat\Traits;

trait HasSender
{
    /**
     * The sender to send SMS.
     */
    protected ?string $sender = null;

    /**
     * Set the sender.
     */
    public function sender(string $sender): static
    {
        $this->sender = $sender;

        return $this;
    }
}
