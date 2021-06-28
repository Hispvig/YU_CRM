<?php
namespace App\Bin;

class BinlistNet implements CheckBin
{
    private $url = "https://lookup.binlist.net/";

    function countryCode(string $bin): string
    {
        $binResults = file_get_contents($this->url . $bin);

        if (!$binResults) {
            throw new \Exception('BIN url return empty result');
        }

        $result = json_decode($binResults);
        $alpha2 = $result->country->alpha2;

        if (!$alpha2) {
            throw new \Exception("the alpha2 parameter in the BIN list is empty");
        }

        return $alpha2;
    }
}