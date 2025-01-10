<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesertaQris;
use DB;

class PesertaQrisController extends Controller
{
    public function index() {
        $participants = PesertaQris::select("peserta_qris.*", "qris_transaction.total_qris_transaction", "qris_transaction.total_nominal_qris_transaction")
                                        ->leftJoin(DB::raw("(SELECT 
                                                    qris_transaction.peserta_id,
                                                    COUNT(qris_transaction.id) as total_qris_transaction,
                                                    SUM(qris_transaction.nominal) as total_nominal_qris_transaction
                                                FROM qris_transaction
                                                GROUP BY qris_transaction.peserta_id
                                            ) as qris_transaction"), function($join) {
                                                $join->on("qris_transaction.peserta_id","=","peserta_qris.id");

                                        })
                                        ->get();



        return view('participants.index', compact('participants'));    
    }

    public function total_business() {
        $participant_businesses = PesertaQris::select(
                        'nama_usaha',
                        DB::raw('COUNT(id) as total_participant_business')
                    )
                    ->groupBy('nama_usaha')
                    ->orderBy(DB::raw('COUNT(id)'), 'desc')
                    ->get();
                            
        $participant_businesses_result[] = ['Nama Usaha Peserta QRIS','Total Usaha Peserta QRIS'];

        foreach ($participant_businesses as $key => $value) {
            $participant_businesses_result[++$key] = [$value->nama_usaha, (int)$value->total_participant_business];
        }

        return view('participants.total_business', compact('participant_businesses_result'));    

    }
}
