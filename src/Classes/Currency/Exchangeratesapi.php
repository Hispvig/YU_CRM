<?php

namespace App\Currency;

class Exchangeratesapi implements CurrencyList
{
    private string $url = 'http://api.exchangeratesapi.io/v1/latest?access_key=08914569ac738cfaad9d780d06135caf';
    private array $list = [];

    public function __construct()
    {
        $this->list = @json_decode(file_get_contents($this->url), true)['rates'];
    }

    function getRate(string $currency): float
    {
        return $this->list[$currency] ?? 0;
    }

    function convertTo(float $amount, string $currencyFrom, string $currencyTo): float
    {
        if ($currencyFrom == $currencyTo) {
            return $amount;
        }

        $rate = $this->getRate($currencyFrom);
        if ($rate > 0) {
            return ($amount / $rate);
        }

        return $amount;
    }
}