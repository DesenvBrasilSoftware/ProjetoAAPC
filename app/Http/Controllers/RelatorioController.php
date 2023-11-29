<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function financeiro()
    {
        return view('relatorio.financeiro');
    }
    public function relatorioFinanceiro()
    {
      $pdf = PDF::loadView('pdf.relatorio_financeiro');
      $pdf->setPaper('A4', 'portrait');

      return $pdf->download('relatorio_financeiro.pdf');
    }
}
