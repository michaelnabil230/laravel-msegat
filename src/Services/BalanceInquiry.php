<?php

namespace MichaelNabil230\Msegat\Services;

use GuzzleHttp\Psr7\MultipartStream;
use Illuminate\Http\Client\Response;
use MichaelNabil230\Msegat\Interfaces\InquiryInterface;
use MichaelNabil230\Msegat\MsegatClient;

class BalanceInquiry extends MsegatClient implements InquiryInterface
{
    /**
     * Get Current Balance from MSEGAT.
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
        $elements = $this->getCredentials() + ['msgEncoding' => 'UTF8'];

        return $this->http
            ->withHeaders(['Content-Type' => 'multipart/form-data; boundary=BOUNDARY'])
            ->withBody(new MultipartStream($elements, 'BOUNDARY'), 'multipart/form-data; boundary=BOUNDARY')
            ->post('Credits.php');
    }
}
