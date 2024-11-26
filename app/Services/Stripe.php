<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;
use App\Services\SalesTaxCalculator;

class Stripe implements PaymentProcessor
{
    public function __construct(private array $config, private SalesTaxCalculator $taxCalculator)
    {

    }

    public function process(array $transactions): void
    {
        // TODO: Implement process() method.
        echo 'processing payment from stripe ' . $transactions['id'];
    }

}
