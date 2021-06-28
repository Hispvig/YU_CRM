<?php
namespace App\Transaction;

class Transaction
{
    private string $bin;
    private float $amount;
    private string $currency;

    public function __construct(array $element)
    {
        $this->bin = $element['bin'] ?? '';
        $this->amount = $element['amount'] ?? 0.0;
        $this->currency = $element['currency'] ?? '';
    }

    /**
     * @return string
     */
    public function getBin(): string
    {
        return $this->bin;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
}