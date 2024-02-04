<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StorageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-test-email', [MailController::class, 'sendTestEmail']);
Route::get('/send-test-email-with-data', [MailController::class, 'sendTestEmailWithData']);
Route::get('/send-mail-with-mailable', [MailController::class, 'sendMailWithMailable']);

Route::get('/copy-invoice', [StorageController::class, 'copyInvoice']);
