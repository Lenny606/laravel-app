<?php

namespace App\Services;

class TransactionService
{
    public function __construct()
    {

    }

    public function findTransaction(int $transactionId)
    {
        return [
            "id" => $transactionId
        ];
    }

}
