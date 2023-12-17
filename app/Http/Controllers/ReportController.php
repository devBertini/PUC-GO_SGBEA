<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;
use App\Models\Loan;

class ReportController extends Controller
{
    public function loanReport()
    {
        $loans = Loan::with('copy', 'collaborator')->get();
        // Processamento adicional para o relatório
        return view('reports.loans', compact('loans'));
    }

    public function reservationReport()
    {
        $reservations = Reservation::with('copy', 'collaborator')->get();
        // Processamento adicional para o relatório
        return view('reports.reservations', compact('reservations'));
    }

    // Outros métodos para relatórios específicos podem ser adicionados aqui
}
