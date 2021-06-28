<?php
namespace App\Bin;

interface CheckBin
{
    /**
     * @param string $bin credit card bin code
     * @return string alpha2 country code
     */

    function countryCode(string $bin):string;
}