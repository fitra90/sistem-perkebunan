<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\DB;

class TransactionHeaderController extends Controller
{
    public function getAll()
    {
        return TransactionHeader::all();
    }

    public function viewAll(Request $request)
    {
        if ($request->session()->has('login')) {
            $data = $this->getAll();
            return view('/transaction-header', ['data' => $data, 'session' => $request->session()->all()]);
        } else {
            return redirect('/login');
        }
    }

    public function viewNew(Request $request)
    {
        if ($request->session()->has('login')) {
            return view('form-header');
        } else {
            return redirect('/login');
        }
    }

    public function saveNew(Request $post)
    {
        $header = new TransactionHeader();
        $data = $post->input();

        $header->notrans = str_replace(" ", "_", $data['notrans']);
        $header->tanggal = $data['tanggal'];
        $header->divisi = $data['divisi'];
        $header->totalbuah = $data['totalbuah'];
        $header->createby = session('username');
        $save = $header->save();
        if ($save) {
            return redirect('/transaction-header');
        } else {
            return redirect('/new-header');
        }
    }

    public function saveEdit(Request $post, $id)
    {
        $data = $post->input();
        $update = TransactionHeader::where('notrans', "=", $id)->update(array(
            'notrans' => str_replace(" ", "_", $data['notrans']),
            'tanggal' => $data['tanggal'],
            'divisi' => $data['divisi'],
            'totalbuah' => $data['totalbuah'],
            'lastby' => session('username'),
        ));
        if ($update) {
            return redirect('/transaction-header');
        } else {
            return redirect('/edit-header/' . $id);
        }
    }

    public function viewEdit(Request $request, $id)
    {
        if ($request->session()->has('login')) {
            $data  = TransactionHeader::where('notrans', $id)->first();
            return view('form-header', ['data' => $data]);
        } else {
            return redirect('/transaction-header');
        }
    }

    public function delete($id)
    {
        // $data  = TransactionHeader::where('notrans', $id)->first();
        $data = DB::table('transaction_headers')->where('notrans', $id)->delete();
        if ($data) {
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
