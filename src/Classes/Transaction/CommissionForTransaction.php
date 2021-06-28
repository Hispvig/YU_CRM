<?php

namespace App\Transaction;

use App\Bin\CheckBin;
use App\Currency\CurrencyList;
use App\Countries\CheckEuropeanUnion;


class CommissionForTransaction
{
    private Transaction $transaction;
    private CurrencyList $currencyList;
    private CheckBin $checkBin;
    private CheckEuropeanUnion $europeanUnion;

    /**
     * CommissionForTransaction constructor.
     * @param array $transactionList transaction list in JSON format
     * @param CurrencyList $currencyList
     * @param CheckBin $checkBin
     */

    public function __construct(
        Transaction $transaction,
        CurrencyList $currencyList,
        CheckBin $checkBin,
        CheckEuropeanUnion $europeanUnion
    )
    {
        $this->transaction = $transaction;
        $this->currencyList = $currencyList;
        $this->checkBin = $checkBin;
        $this->europeanUnion = $europeanUnion;
    }

    public function getResult(): string
    {
        $alpha2code = $this->checkBin->countryCode($this->transaction->getBin());

        $convertCurrency = $this->currencyList->convertTo(
            $this->transaction->getAmount(),
            $this->transaction->getCurrency(),
            'EUR'
        );

        $sum = $convertCurrency * ($this->europeanUnion->checkIsEuropeanUnionByAlphaTwoCode($alpha2code) ? 0.01 : 0.02);
        $result = round($sum, 2, PHP_ROUND_HALF_UP);

        return "$result\n";
    }

}