<?php

namespace MichaelNabil230\Msegat\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Carbon;
use InvalidArgumentException;
use MichaelNabil230\Msegat\Interfaces\SendingInterface;
use MichaelNabil230\Msegat\MsegatClient;
use MichaelNabil230\Msegat\OTPGenerator;
use MichaelNabil230\Msegat\Traits\HasMessage;
use MichaelNabil230\Msegat\Traits\HasNumbers;
use MichaelNabil230\Msegat\Traits\HasSender;

class Sms extends MsegatClient implements SendingInterface
{
    use HasMessage, HasNumbers, HasSender;

    protected string|Carbon $at = 'now';

    /**
     * Send OTP SMS to API.
     *
     * @throws \Throwable|\MichaelNabil230\Msegat\Exceptions\MsegatException
     */
    public function otp(bool $asArabic = false): array
    {
        $code = app(OTPGenerator::class)->generate();

        $this
            ->sender('auth-mseg')
            ->message($asArabic ? 'رمز التحقق: ' : 'Pin Code is: '.$code);

        return [
            'code' => $code,
            ...$this->send(),
        ];
    }

    /**
     * Send SMS to API.
     *
     * @throws \Throwable|\MichaelNabil230\Msegat\Exceptions\MsegatException
     */
    public function send(): array
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
                'sendsms.php',
                $this->getCredentials() + [
                    'userSender' => $this->sender ?? config('msegat.sender'),
                    'msg' => $this->message, 'numbers' => $this->numbers,
                    'timeToSend' => $this->at == 'now' ? 'now' : 'later',
                    'exactTime' => $this->at != 'now' ? $this->at : 'now',
                ],
            );
    }

    /**
     * Set time to send.
     *
     * @throws \InvalidArgumentException
     */
    public function at(string|Carbon $at)
    {
        if ($at instanceof Carbon) {
            $at = $at->format('Y-m-d H:i:s');
        }

        throw_if(
            now()->isBefore($at),
            new InvalidArgumentException('At is must be in the future'),
        );

        $this->at = $at;

        return $this;
    }
}
