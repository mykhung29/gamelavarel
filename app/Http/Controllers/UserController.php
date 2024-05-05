<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }
    public function AuthLogin()
    {
        $user_id = Session::get('id');
        if ($user_id) {
            return Redirect::to('/add-cart/{product_id}');
        } else {
            return Redirect::to('/login')->send();
        }
    }

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
    public function logout()
    {
        Session::put('name', null);
        Session::put('id', null);
        return Redirect::to('/');
    }

    public function add_to_cart()
    {
        $this->AuthLogin();
        $product_id = $_POST['id'];
        $user_id = Session::get('id');
        $cart = DB::table('carts')->where('product_id', $product_id)->where('user_id', $user_id)->first();

        if ($cart) {
            // If the product exists in the cart, increment the quantity
            DB::table('carts')->where('product_id', $product_id)->where('user_id', $user_id)->increment('quantity');
        } else {
            // If the product does not exist in the cart, add it
            $data = array();
            $data['product_id'] = $product_id;
            $data['product_name'] = $_POST['name'];
            $data['product_price'] = $_POST['price'];
            $data['quantity'] = 1;
            $data['image'] = $_POST['img'];
            $data['user_id'] = $user_id;
            $data['created_at'] = date('Y-m-d H:i:s');
            DB::table('carts')->insert($data);
        }

        return Redirect::to('/show_cart');
    }

    public function cart()
    {
        $this->AuthLogin();
        $user_id = Session::get('id');
        $cart = DB::table('carts')->where('user_id', $user_id)->get();
        $order_place = DB::table('orders')->where('id_user', $user_id)->get();

        $total = 0;
        foreach ($cart as $item) {
            $total += $item->product_price * $item->quantity;
        }

        return view('pages.cart', ['cart' => $cart, 'total' => $total, 'order_place' => $order_place]);
    }

    public function delete_to_cart($id)
    {
        $this->AuthLogin();
        DB::table('carts')->where('id', $id)->delete();
        // Session::put('message', 'Đã xóa');
        return Redirect::to('/show_cart');
    }
    public function checkout_cart()
    {
        // $this->AuthLogin();
        return view('pages.checkout');


    }

    public function edit_info()
    {
        $this->AuthLogin();
        return view('pages.place');
    }

    public function add_place_ship(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['note'] = $request->note;
        $data['id_user'] = Session::get('id');
        $data['created_at'] = date('Y-m-d H:i:s');

        DB::table('orders')->insert($data);

        return Redirect::to('/');
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
