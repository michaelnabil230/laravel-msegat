<?php

namespace MichaelNabil230\Msegat\Services;

use GuzzleHttp\Psr7\MultipartStream;
use Illuminate\Http\Client\Response;
use MichaelNabil230\Msegat\Interfaces\CalculateInterface;
use MichaelNabil230\Msegat\MsegatClient;
use MichaelNabil230\Msegat\Traits\HasMessage;
use MichaelNabil230\Msegat\Traits\HasNumbers;

class Calculate extends MsegatClient implements CalculateInterface
{
    use HasMessage, HasNumbers;

    /**
     * Get the calculate from MSEGAT.
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
        $elements = $this->getCredentials() + [
            'contactType' => 'numbers',
            'By' => 'Link',
            'msgEncoding' => 'UTF8',
            'msg' => $this->message,
            'contacts' => $this->numbers,
        ];

        return $this->http
            ->withHeaders(['Content-Type' => 'multipart/form-data; boundary=BOUNDARY'])
            ->withBody(new MultipartStream($elements, 'BOUNDARY'), 'multipart/form-data; boundary=BOUNDARY')
            ->post('calculateCost.php');
    }
}
