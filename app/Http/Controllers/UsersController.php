<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function home(Request $request)
    {
        if ($request->session()->has('login')) {
            return redirect('/login');
        } else {
            return redirect('/login');
        }
    }

    public function getAll()
    {
        return User::all();
    }

    public function viewAll(Request $request)
    {
        if ($request->session()->has('login')) {
            $data = $this->getAll();
            return view('users', ['data' => $data]);
        } else {
            return redirect('/login');
        }
    }

    public function viewNew(Request $request)
    {
        if ($request->session()->has('login')) {
            return view('form-user');
        } else {
            return redirect('/login');
        }
    }

    public function saveNew(Request $post)
    {
        $user = new User;
        $data = $post->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string',
        ]);

        $user->username = $data['username'];
        $user->password = sha1($data['password']);
        $user->createby = session('username');
        $save = $user->save();
        if ($save) {
            return redirect('/users');
        } else {
            return redirect('/new-user');
        }
    }

    public function saveEdit(Request $post, $id)
    {
        $data = $post->input();

        $update = User::where('id', "=", $id)->update(array(
            'username' => $data['username'],
            'password' => sha1($data['password']),
            'lastby' => session('username')
        ));
        if ($update) {
            return redirect('/users');
        } else {
            return redirect('/edit-user/' . $id);
        }
    }

    public function viewEdit(Request $request, $id)
    {
        if ($request->session()->has('login')) {
            $data  = User::where('id', $id)->first();
            return view('form-user', ['data' => $data]);
        } else {
            return redirect('/login');
        }
    }

    public function delete($id)
    {
        $data  = User::where('id', $id)->first();
        if ($data != null) {
            $data->delete();
            return true;
        } else {
            return false;
        }
    }

    public function login(Request $request) {
        if ($request->session()->has('login')) {
            return redirect('/login');
        } else {
            return view('login');
        }
    }

    public function getLogin(Request $post)
    {
        $data = $post->input();
        $user = User::where([['username', '=', $data['username']], ['password', '=', sha1($post['password'])]])->first();
        if (isset($user->id)) {
            session(['username' => $user->username, 'username' => $user->username, 'login' => true]);
            return redirect()->action([TransactionDetailController::class, 'viewAll']);
        } else {
            session()->flash('error', '');
            return redirect('/login');
        }
    }

    public function apiLogin(Request $post)
    {
        $data = $post->input();
        $user = User::where([['username', '=', $data['username']], ['password', '=', sha1($post['password'])]])->first();
        if ($user && $user->status > 0 && $user->role == 2 && $user->status > 0) {
            $token = $user->createToken('adminToken')->plainTextToken;
            return Response(["message"=>"Logged in", "token" => $token], 200);
        } else if ($user && $user->status > 0 && $user->role == 1 && $user->status > 0) {
            $token = $user->createToken('staffToken')->plainTextToken;
            return Response(["message"=>"Logged in", "token" => $token], 200);
        } else {
            return Response(["message"=>"Wrong username / password!"], 404);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/login");
    }

    public function apiLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return Response(["message" => "Logged out!"], 200);
    }

    public function index()
    {
        return Response($this->getAll(), 200);
    }

}
