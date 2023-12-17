<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CollaboratorHistoryController;
use App\Http\Controllers\ReservationStatusController;
use App\Http\Controllers\CollaboratorTypeController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\LawyerDetailController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LoanStatusController;
use App\Http\Controllers\CopyStatusController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\LawAreaController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return response()->json(['message' => 'Sucesso', 'details' => "Teste realizado com sucesso."], 200);
});


Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

// Rotas para livros
Route::resource('books', BookController::class);

// Rotas para exemplares
Route::resource('copies', CopyController::class);

// Rotas para empréstimos
Route::resource('loans', LoanController::class);

// Rotas para reservas
Route::resource('reservations', ReservationController::class);

// Rotas para editoras
Route::resource('publishers', PublisherController::class);

// Rotas para Autores
Route::resource('authors', AuthorController::class);

// Rotas para Colaboradores
Route::resource('collaborators', CollaboratorController::class);

// Rotas para status do empréstimo
Route::resource('loan_statuses', LoanStatusController::class);

// Rotas para status da reserva
Route::resource('reservation_statuses', ReservationStatusController::class);

// Rotas para tipos de colaborador
Route::resource('collaborator_types', CollaboratorTypeController::class);

// Rotas para áreas de advocacia
Route::resource('law_areas', LawAreaController::class);

// Rotas para exemplar
Route::resource('copy_statuses', CopyStatusController::class);

// Rotas para informações adicionais para advogados
Route::resource('lawyer_details', LawyerDetailController::class);

// Rotas para histórico de funções do colaborador
Route::resource('collaborator_histories', CollaboratorHistoryController::class);

// Rotas para usuários
Route::resource('users', UserController::class);

// Rotas para relatórios
Route::get('reports/loans', [ReportController::class, 'loanReport'])->name('reports.loans');
Route::get('reports/reservations', [ReportController::class, 'reservationReport'])->name('reports.reservations');