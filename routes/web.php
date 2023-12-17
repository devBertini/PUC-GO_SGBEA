<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    BookController, CopyController, PublisherController, AuthorController, LawAreaController,
    CopyStatusController, CollaboratorController, CollaboratorTypeController, LawyerDetailController,
    CollaboratorHistoryController, LoanStatusController, LoanController, ReservationStatusController,
    ReservationController, UserController, ReportController
};

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

// Página Inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas de Autenticação
Auth::routes();

// Dashboard - Protegido por autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas para Livros
    Route::resource('books', BookController::class);

    // Rotas para Exemplares
    Route::resource('copies', CopyController::class);

    // Rotas para Editoras
    Route::resource('publishers', PublisherController::class);

    // Rotas para Autores
    Route::resource('authors', AuthorController::class);

    // Rotas para Áreas de Advocacia
    Route::resource('law_areas', LawAreaController::class);

    // Rotas para Status de Exemplares
    Route::resource('copy_statuses', CopyStatusController::class);

    // Rotas para Colaboradores
    Route::resource('collaborators', CollaboratorController::class);

    // Rotas para Tipos de Colaboradores
    Route::resource('collaborator_types', CollaboratorTypeController::class);

    // Rotas para Detalhes de Advogados
    Route::resource('lawyer_details', LawyerDetailController::class);

    // Rotas para Histórico de Colaboradores
    Route::resource('collaborator_histories', CollaboratorHistoryController::class);

    // Rotas para Status de Empréstimos
    Route::resource('loan_statuses', LoanStatusController::class);

    // Rotas para Empréstimos
    Route::resource('loans', LoanController::class);

    // Rotas para Status de Reservas
    Route::resource('reservation_statuses', ReservationStatusController::class);

    // Rotas para Reservas
    Route::resource('reservations', ReservationController::class);

    // Rotas para Usuários
    Route::resource('users', UserController::class);

    // Rotas para Relatórios
    Route::get('reports/loans', [ReportController::class, 'loanReport'])->name('reports.loans');
    Route::get('reports/reservations', [ReportController::class, 'reservationReport'])->name('reports.reservations');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
