<?php

namespace MichaelNabil230\Msegat;

use MichaelNabil230\Msegat\Services\BalanceInquiry;
use MichaelNabil230\Msegat\Services\Calculate;
use MichaelNabil230\Msegat\Services\SenderNamesInquiry;
use MichaelNabil230\Msegat\Services\Sms;

class Msegat
{
    /**
     * Send massage to Msegat.
     */
    public static function sms(): Sms
    {
        return new Sms;
    }

    /**
     * Calculate the cost to Msegat.
     */
    public static function calculate(): Calculate
    {
        return new Calculate;
    }

    /**
     * Get the balance of Current SMS Balance.
     */
    public static function balanceInquiry(): BalanceInquiry
    {
        return new BalanceInquiry;
    }

    /**
     * Get Current SMS Balance.
     */
    public static function senderNamesInquiry(): SenderNamesInquiry
    {
        return new SenderNamesInquiry;
    }
}
