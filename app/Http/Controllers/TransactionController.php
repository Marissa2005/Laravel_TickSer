<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;  // Pastikan model Transaction diimport
use Barryvdh\DomPDF\Facade\Pdf;  // Pastikan Pdf diimport

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('transaction.transaction', compact('transactions'));
    }

    public function cetak()
    {
        $transactions = Transaction::all();  // Perbaikan: variabel seharusnya $transactions
        $pdf = Pdf::loadView('transaction.transaction-cetak', compact('transactions'));  // Perbaikan: konsisten dengan compact('transactions')
        return $pdf->download('laporan-transaksi.pdf');
    }
}
