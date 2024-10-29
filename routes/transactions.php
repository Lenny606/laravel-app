<?php
declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProcessTransactionController;


//TRANSACTIONS --------------------------------
//group by prefix
Route::prefix('transactions')->group(function () {
    //group by controller
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transactions');
        Route::get('/{id}', [TransactionController::class, 'show'])->whereNumber("id")->name('transaction');
        Route::post('/create', [TransactionController::class, 'create']);
        Route::post('/', [TransactionController::class, 'store']);
    });

    //invokable single action controller
    Route::post('/{id}/process', ProcessTransactionController::class);
});
