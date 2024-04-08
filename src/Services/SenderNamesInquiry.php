<?php

namespace MichaelNabil230\Msegat\Services;

use Illuminate\Http\Client\Response;
use MichaelNabil230\Msegat\Interfaces\InquiryInterface;
use MichaelNabil230\Msegat\MsegatClient;

class SenderNamesInquiry extends MsegatClient implements InquiryInterface
{
    /**
     * Get all sender names from MSEGAT.
     *
     * @throws \Throwable|\MichaelNabil230\Msegat\Exceptions\MsegatException
     */
    public function get(): array
    {
        return $this->formatResponse($this->request());
    }

    /**
     * Send API Request.
     *
     * @throws \Throwable
     */
    protected function request(): Response
    {
        return $this->http
            ->acceptJson()
            ->post(
                'senders.php',
                $this->getCredentials() + ['msgEncoding' => 'UTF8']
            );
    }
}
