<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\OrderDetail;

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
        return Redirect::to('/show_cart');
    }
    public function delete_place($id)
    {
        $this->AuthLogin();
        DB::table('orders')->where('id', $id)->delete();
        return Redirect::to('/edit_place');
    }


    public function show_info()
    {
        $this->AuthLogin();
        $info = DB::table('users')->where('id', Session::get('id'))->first();
        return view('pages.edit_info', ['info' => $info]);
    }
    public function edit_place()
    {
        $this->AuthLogin();
        $user_id = Session::get('id');
        $order_place = DB::table('orders')->where('id_user', $user_id)->get();
        return view('pages.place', ['order_place' => $order_place]);
    }
    public function edit_info(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['updated_at'] = date('Y-m-d H:i:s');

        DB::table('users')->where('id', Session::get('id'))->update($data);

        return Redirect::to('/show_info');
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

    public function checkout(Request $request)
    {
        $this->AuthLogin();
        $user_id = Session::get('id');
        $place_id = $request->address;
        $cart = DB::table('carts')->where('user_id', $user_id)->get();
        $last_order_id = DB::table('order_details')->max('id_order');
        $new_order_id = $last_order_id ? $last_order_id + 1 : 1;
        $status = 0;
        foreach ($cart as $item) {
            DB::table('order_details')->insert([
                'id_order' => $new_order_id,
                'user_id' => $user_id,
                'place_id' => $place_id,
                'status' => $status,
                'product_id' => $item->product_id,
                'product_name' => $item->product_name,
                'image' => $item->image,
                'quantity' => $item->quantity,
                'price' => $item->product_price,
                'created_at' => now(),
                'updated_at' => now()
            ]);


        }

        DB::table('carts')->where('user_id', $user_id)->delete();

        return view('pages.checkout_success');
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
