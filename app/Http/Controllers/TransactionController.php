<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentProcessor;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(public readonly TransactionService $transactionService){

    }

    /**
     * main render method
     * @return string
     */
    public function index(): string
    {
        return redirect()->route('transactions'); //named route
    }
    public function show(string $id, PaymentProcessor $paymentProcessor)
    {
        $transaction = $this->transactionService->findTransaction($id);
        $paymentProcessor->process($transaction);
        return to_route('transaction', $transaction); //named route + parameter

    }
    public function create()
    {
        return "index";
    }


    /**
     * Request Injected in method, not in constructor => not need in other methods
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        return "index";
    }
}
