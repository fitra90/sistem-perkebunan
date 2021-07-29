<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    
    public function getAll() {
        $dataByDate =  DB::table('transaction_details')
        ->join('transaction_headers', 'transaction_details.notrans', '=', 'transaction_headers.notrans')
        ->join('fruit_criterias', 'transaction_details.idbuah', '=', 'fruit_criterias.id')
        ->select('transaction_details.*', 'transaction_headers.tanggal', 'fruit_criterias.name')
        ->get();
    }

    public function viewAll(Request $request) {
        $dataByDate =  DB::table('transaction_details')
        ->join('transaction_headers', 'transaction_details.notrans', '=', 'transaction_headers.notrans')
        ->join('fruit_criterias', 'transaction_details.idbuah', '=', 'fruit_criterias.id')
        ->select('transaction_details.*', 'transaction_headers.tanggal', 'fruit_criterias.name')
        ->get();
        
        $dataByDivisi =  DB::table('transaction_details')
        ->join('transaction_headers', 'transaction_details.notrans', '=', 'transaction_headers.notrans')
        ->join('fruit_criterias', 'transaction_details.idbuah', '=', 'fruit_criterias.id')
        ->select('transaction_details.*', 'transaction_headers.tanggal', 'fruit_criterias.name')
        // ->groupBy('tanggal')
        ->get();
        dd($dataByDate);
        if ($request->session()->has('login')) {
            return view('report', ['data_by_date' => $dataByDate, 'data_by_divisi' => $dataByDivisi]);
        } else {
            return redirect('/login');
        }
    }

   
}
