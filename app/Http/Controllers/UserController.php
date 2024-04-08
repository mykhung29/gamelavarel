<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.register');
    }
    public function add_to_cart(){
        $data = array();
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['price'] = $_POST['price'];
        $data['quantity'] = $_POST['quantity'];
        $data['image'] = $_POST['image'];
        $data['total'] = $data['price'] * $data['quantity'];
        $data['user_id'] = Session::get('id');
        $data['created_at'] = date('Y-m-d H:i:s');
        DB::table('cart')->insert($data);
        return Redirect::to('/');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['phone'] = $request->phone;

        // Check if email already exists
        $existingUser = DB::table('users')->where('email', $data['email'])->first();
        if ($existingUser) {
            Session::put('message', 'Tên tài khoản đã tồn tại !!!');
            return Redirect::to('/register');
        }

        // Check if password confirmation matches
        if ($request->password !== $request->password_confirmation) {
            Session::put('message', 'Xác nhận mật khẩu không đúng !!!');
            return Redirect::to('/register');
        }

        DB::table('users')->insert($data);
        return view('pages.login');
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('users')->where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('name', $result->name);
            Session::put('id', $result->id);
            return Redirect::to('/');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không đúng !!!');
            return Redirect::to('/register');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
