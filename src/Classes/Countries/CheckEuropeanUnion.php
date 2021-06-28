<?php
namespace App\Countries;

interface CheckEuropeanUnion
{
    /**
     * @param string $code Alpha2 country code
     * @return bool
     */
    public function checkIsEuropeanUnionByAlphaTwoCode(string $code):bool;
}