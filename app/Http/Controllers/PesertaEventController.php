<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesertaEvent;
use DB;

class PesertaEventController extends Controller
{
    public function index() {
        $events = PesertaEvent::select("ref_event.nama_event", DB::raw("SUM(qris_transaction.total_qris_transaction) AS total_qris_transaction_by_event"))
                                        ->leftJoin(DB::raw("(SELECT 
                                                    ref_event.id,
                                                    ref_event.nama_event as nama_event 
                                                FROM ref_event
                                            ) as ref_event"), function($join) {
                                                $join->on("peserta_event.event_id","=","ref_event.id");

                                            })
                                        ->leftJoin(DB::raw("(SELECT 
                                                        qris_transaction.peserta_id,
                                                        COUNT(qris_transaction.id) as total_qris_transaction
                                                    FROM qris_transaction
                                                    GROUP BY qris_transaction.peserta_id
                                                ) as qris_transaction"), function($join) {
                                                    $join->on("qris_transaction.peserta_id","=","peserta_event.peserta_id");

                                            })
                                        ->groupBy("ref_event.nama_event")
                                        ->orderBy(DB::raw("SUM(qris_transaction.total_qris_transaction)"), 'desc')
                                        ->take(5)
                                        ->get();
        
        $event_result[] = ['Nama Event','Total Transaksi QRIS'];

        foreach ($events as $key => $value) {
            $event_result[++$key] = [$value->nama_event, (int)$value->total_qris_transaction_by_event];
        }

        return view('events.index', compact('event_result'));    
    }
}
