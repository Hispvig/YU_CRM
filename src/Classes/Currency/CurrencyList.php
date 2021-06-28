<?php
namespace App\Currency;

interface CurrencyList
{
    /**
     * @return array [(string) "currency code" => (float) rate,]
     * exs: ["EUR":1]
     */

    function getRate(string $currency):float;
    function convertTo(float $amount, string $currencyFrom, string $currencyTo):float;
}