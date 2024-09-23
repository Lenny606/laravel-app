<?php
declare(strict_types=1);

namespace App;

/**
 * Tinker test class
 */
class PaymentService
{
    public function paid() : bool {
        echo "PAID" . PHP_EOL;

        return true;
    }
}
