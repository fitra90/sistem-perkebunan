<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class TransactionDetailController extends Controller
{
    public function getAll()
    {
        return TransactionDetail::all();
    }

    public function viewAll(Request $request)
    {
        if ($request->session()->has('login')) {
            $data = $this->getAll();
            return view('/transactions', ['data' => $data, 'session' => $request->session()->all()]);
        } else {
            return redirect('/login');
        }
    }

    public function viewNew(Request $request)
    {
        $data_buah = DB::table('fruit_criterias')->get();
        $data_header = DB::table('transaction_headers')->get();
        if ($request->session()->has('login')) {
            return view('form-transaction',['data_header' => $data_header, 'data_buah'=>$data_buah]);
        } else {
            return redirect('/');
        }
    }

    public function saveNew(Request $post)
    {
        $transaction = new TransactionDetail();
        $data = $post->input();
        $transaction->notrans = $data['notrans'];
        $transaction->idbuah = $data['buah'];
        $transaction->jumlah = $data['jumlah'];
        $transaction->lastby = session('username');
        $save = $transaction->save();
        if ($save) {
            return redirect('/');
        } else {
            return redirect('/new-transaction');
        }
    }

    public function saveEdit(Request $post, $id)
    {
        $data = $post->input();
        $update = TransactionDetail::where('id', "=", $id)->update(array(
            'notrans' => $data['notrans'],
            'idbuah' => $data['buah'],
            'jumlah' => $data['jumlah'],
            'lastby' => session('username')
        ));
        if ($update) {
            return redirect('/');
        } else {
            return redirect('/edit-transaction/' . $id);
        }
    }

    public function viewEdit(Request $request, $id)
    {
        if ($request->session()->has('login')) {
            $data_buah = DB::table('fruit_criterias')->get();
            $data_header = DB::table('transaction_headers')->get();
            $data  = TransactionDetail::where('id', $id)->first();
            return view('form-transaction', ['data' => $data, 'data_header' => $data_header, 'data_buah'=>$data_buah]);
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $data  = TransactionDetail::where('id', $id)->first();
        if ($data != null) {
            $data->delete();
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        return Response($this->getAll());
    }

}
