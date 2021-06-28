<?php
require "vendor/autoload.php";

$currencyList = new \App\Currency\Exchangeratesapi();
$checkBin = new \App\Bin\BinlistNet();
$europeanUnion = new \App\Countries\ManualInput();

foreach (file($argv[1]) as $row) {
    if(!$row){
        continue;
    }

    $element = json_decode($row, true);

    $elem = new \App\Transaction\CommissionForTransaction(
        new \App\Transaction\Transaction($element),
        $currencyList,
        $checkBin,
        $europeanUnion,
    );

    echo $elem->getResult();
}