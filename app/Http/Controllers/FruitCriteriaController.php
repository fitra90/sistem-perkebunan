<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FruitCriteria;

class FruitCriteriaController extends Controller
{
    
    public function getAll() {
        return FruitCriteria::all();
    }

    public function viewAll(Request $request) {
        if ($request->session()->has('login')) {
            $data = $this->getAll();
            return view('fruit-criteria', ['data' => $data, 'session'=>$request->session()->all()]);
        } else {
            return redirect('/login');
        }
    }

    public function viewNew(Request $request) {
        if ($request->session()->has('login')) {
            return view('form-fruit-criteria');
        } else {
            return redirect('/login');
        }
    }
    
    public function saveNew(Request $post) {
        $criteria = new FruitCriteria();
        $data = $post->input();
        $criteria->name = $data['name'];
        $criteria->createby = session('username');
        $criteria->lastby = session('username');
        $save = $criteria->save();
        if($save) {
            return redirect('/fruit-criteria');
        } else{
            return redirect('/new-fruit-criteria');
        }
    }
    
    public function saveEdit(Request $post, $id) {
        $data = $post->input();
        $update = FruitCriteria::where('id', "=", $id)->update(array(
            'name' => $data['name'],
            'lastby' => session('username'),
        ));
        if($update) {
            return redirect('/fruit-criteria');
        } else{
            return redirect('/edit-fruit-criteria/'.$id);
        }
    }
    
    public function viewEdit(Request $request, $id) {
        if ($request->session()->has('login')) {
            $data  = FruitCriteria::where('id',$id)->first();
            return view('form-fruit-criteria', ['data' => $data]);
        } else {
            return redirect('/login');
        }
    }
    
    public function delete($id) {
        $data  = FruitCriteria::where('id',$id)->first();
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
