<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;

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
        if ($request->session()->has('login')) {
            return view('form-stuff');
        } else {
            return redirect('/');
        }
    }

    public function saveNew(Request $post)
    {
        $stuff = new TransactionDetail();
        $data = $post->input();
        $stuff->name = $data['name'];
        $stuff->stock = $data['stock'];
        $stuff->status = $data['status'];
        $save = $stuff->save();
        if ($save) {
            return redirect('/');
        } else {
            return redirect('/new-stuff');
        }
    }

    public function saveEdit(Request $post, $id)
    {
        $data = $post->input();
        $update = TransactionDetail::where('id', "=", $id)->update(array(
            'name' => $data['name'],
            'stock' => $data['stock'],
            'status' => $data['status']
        ));
        if ($update) {
            return redirect('/');
        } else {
            return redirect('/edit-stuff/' . $id);
        }
    }

    public function viewEdit(Request $request, $id)
    {
        if ($request->session()->has('login')) {
            $data  = TransactionDetail::where('id', $id)->first();
            return view('form-stuff', ['data' => $data]);
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
