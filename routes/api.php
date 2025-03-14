<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\DespatchController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\InvoicesController;
use App\Http\Controllers\Api\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisterController::class, 'store']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);

Route::apiResource('companies', CompanyController::class)->middleware('auth:api');

//Invoices
Route::post('invoices/send', [InvoicesController::class, 'send'])->middleware('auth:api');
Route::post('invoices/xml', [InvoicesController::class, 'xml'])->middleware('auth:api');
Route::post('invoices/pdf', [InvoicesController::class, 'pdf'])->middleware('auth:api');

//Notes
Route::post('notes/send', [NoteController::class, 'send'])->middleware('auth:api');
Route::post('notes/xml', [NoteController::class, 'xml'])->middleware('auth:api');
Route::post('notes/pdf', [NoteController::class, 'pdf'])->middleware('auth:api');

//Despatches
Route::post('despatches/send', [DespatchController::class, 'send'])->middleware('auth:api');
Route::post('despatches/xml', [DespatchController::class, 'xml'])->middleware('auth:api');
Route::post('despatches/pdf', [DespatchController::class, 'pdf'])->middleware('auth:api');
