<?php

use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('open-tickets',[TicketController::class,'openTickets'])->name('open-tickets');

Route::get('close-tickets',[TicketController::class,'closeTickets'])->name('close-tickets');

Route::get('users/{email}/tickets',[TicketController::class,'userTickets'])->name('user-tickets');

Route::get('stats',[TicketController::class,'ticketStats'])->name('stats');

