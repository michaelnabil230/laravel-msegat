<?php

namespace MichaelNabil230\Msegat;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use MichaelNabil230\Msegat\Responses\MsegatResponse;

abstract class MsegatClient
{
    /**
     * Http Client
     */
    protected PendingRequest $http;

    /**
     * Msegat Processor Constructor.
     */
    public function __construct()
    {
        $this->http = Http::baseUrl(config('msegat.endpoint', 'https://www.msegat.com/gw'));
    }

    /**
     * Send API Request.
     *
     * @throws \Throwable
     */
    abstract protected function request(): Response;

    /**
     * Get the credentials.
     */
    protected function getCredentials(): array
    {
        return [
            'userName' => config('msegat.username'),
            'apiKey' => config('msegat.key'),
        ];
    }

    /**
     * Format the response into an array
     *
     * @throws \MichaelNabil230\Msegat\Exceptions\MsegatException
     */
    protected function formatResponse(Response $response): array
    {
        return MsegatResponse::make($response)->format();
    }
}
