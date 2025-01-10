<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QrisTransaction;
use DB;

class QrisTransactionController extends Controller
{
    public function index() {
        $transactions = QrisTransaction::select(
                        DB::raw('SUM(nominal) as total_nominal_qris_transaction_by_month'), 
                        DB::raw("DATE_FORMAT(tanggal_transaksi,'%M %Y') as month")
                    )
                    ->groupBy('month')
                    ->orderBy('tanggal_transaksi', 'asc')
                    ->get();
        
        $transaction_result[] = ['Bulan','Total Nominal Transaksi QRIS'];

        foreach ($transactions as $key => $value) {
            $transaction_result[++$key] = [$value->month, (int)$value->total_nominal_qris_transaction_by_month];
        }

        return view('transactions.index')->with('transactions',json_encode($transaction_result));;    
    }
}
