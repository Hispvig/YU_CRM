<?php

namespace App\Countries;

class ManualInput implements CheckEuropeanUnion
{
    private $list = [
        'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES',
        'FI', 'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU',
        'LV', 'MT', 'NL', 'PO', 'PT', 'RO', 'SE', 'SI', 'SK',
    ];

    public function checkIsEuropeanUnionByAlphaTwoCode(string $code): bool
    {
        return in_array($code, $this->list);
    }
}