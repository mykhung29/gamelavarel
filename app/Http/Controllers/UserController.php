<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.login-register.register');
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
        $data['user'] = $request->user;
        $data['password'] = $request->password;
        $data['phone'] = $request->phone;

        // Check if email already exists
        $existingUser = DB::table('users')->where('user', $data['user'])->first();
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
        return view('pages.login-register.login');
    }
    public function login(Request $request)
    {
        $user = $request->user;
        $password = $request->password;

        $result = DB::table('users')->where('user', $user)->where('password', $password)->first();
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

    public function real_email_form(Request $request)
    {
        $email = $request->email;
        $result = DB::table('users')->where('email', $email)->first();
        if ($result) {
            $token = Str::random(10);
            DB::table('users')->where('email', $email)->update(['remember_token' => $token]);
            $result1 = DB::table('users')->where('email', $email)->first();

            $data = array();
            $data['email'] = $result1->email;
            $data['name'] = $result1->name;
            $data['token'] = $result1->remember_token; // Thêm token vào dữ liệu gửi email
            Mail::send('pages.email-content.cf_email_content', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])->subject('Xác thực email');
            });
            Session::put('message', 'Mã xác nhận đã được gửi vào email của bạn !!!');
            return view('pages.email-content.confirm_email');
        }
        return view('pages.email-content.confirm_email');
    }

    public function confirm_email(Request $request)
    {
        $token = $request->token;
        $result = DB::table('users')->where('remember_token', $token)->first();
        if ($result) {
            DB::table('users')->where('remember_token', $token)->update(['email_status' => 1]);
            Session::put('message', 'Xác thực email thành công !!!');
            return Redirect::to('/show_info');
        } else {
            Session::put('message', 'Token không hợp lệ !!!');
            return Redirect::to('/real_email');
        }
    }

    public function forgot_password()
    {
        return view('pages.login-register.forgot_pass');
    }

    public function send_email(Request $request)
    {
        $email = $request->email;
        $result = DB::table('users')->where('email', $email)->where('email_status', '1')->first();
        if ($result) {
            $token = Str::random(10);
            DB::table('users')->where('email', $email)->update(['remember_token' => $token]);
            $result1 = DB::table('users')->where('email', $email)->first();

            $data = array();
            $data['email'] = $result1->email;
            $data['name'] = $result1->name;
            $data['token'] = $result1->remember_token;
            Mail::send('pages.email-content.forgotpass', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])->subject('Lấy lại mật khẩu');
            });
            Session::put('message', 'Mã xác nhận đã được gửi vào email của bạn !!!');
            return view('pages.email-content.confirm_token');
        } else {
            Session::put('message', 'Email không tồn tại hoặc chưa xác thực!!!');
            return Redirect::to('/forgot_pass');
        }
    }

    public function check_token(Request $request)
    {
        $token = $request->token;
        $result = DB::table('users')->where('remember_token', $token)->first();
        if ($result) {
            return view('pages.user.reset_pass', ['token' => $token]);
        } else {
            Session::put('message', 'Token không hợp lệ !!!');
            return Redirect::to('/check-token');
        }
    }

    public function reset_pass(Request $request)
    {
        $token = $request->token;
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        if ($password !== $confirm_password) {
            Session::put('message', 'Xác nhận mật khẩu không đúng !!!');
            return Redirect::to('/check-token/' . $token);
        } else {
            DB::table('users')->where('remember_token', $token)->update(['password' => $password]);
            Session::put('message', 'Đổi mật khẩu thành công !!!');
            return Redirect::to('/login');
        }
    }

    public function add_to_cart()
    {
        $this->AuthLogin();
        $product_id = $_POST['id'];
        $user_id = Session::get('id');
        $cart = DB::table('carts')->where('product_id', $product_id)->where('user_id', $user_id)->first();
        $quantity = $_POST['quantity'];
        if ($cart) {
            // If the product exists in the cart, increment the quantity
            DB::table('carts')->where('product_id', $product_id)->where('user_id', $user_id)->increment('quantity', $quantity);
        } else {
            // If the product does not exist in the cart, add it
            $data = array();
            $data['product_id'] = $product_id;
            $data['product_name'] = $_POST['name'];
            $data['product_price'] = $_POST['price'];
            $data['quantity'] = $_POST['quantity'];
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
        return view('pages.cart.cart', ['cart' => $cart, 'total' => $total, 'order_place' => $order_place]);
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

        if ($info->email_status == 0) {
            Session::put('message_email', 'Xác thực email');
        } else {
            Session::put('message_email', 'Email đã xác thực');
        }

        return view('pages.user.edit_info', ['info' => $info]);
    }
    public function edit_place()
    {
        $this->AuthLogin();
        $user_id = Session::get('id');
        $order_place = DB::table('orders')->where('id_user', $user_id)->get();
        return view('pages.user.place', ['order_place' => $order_place]);
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

    public function change_pass(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $current_pass = $request->current_password;
        $data['password'] = $request->new_password;
        $confirm_pass = $request->confirm_password;

        if ($data['password'] !== $confirm_pass) {
            Session::put('message', 'Xác nhận mật khẩu không đúng !!!');
            return Redirect::to('/show_info');
        } else {
            $user = DB::table('users')->where('id', Session::get('id'))->first();
            if ($current_pass !== $user->password) {
                Session::put('message', 'Mật khẩu hiện tại không đúng !!!');
                return Redirect::to('/show_info');
            } else {
                DB::table('users')->where('id', Session::get('id'))->update($data);
                Session::put('message', 'Đổi mật khẩu thành công !!!');
                return Redirect::to('/show_info');
            }
        }
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

        return view('pages.cart.checkout_success');
    }

    public function show_order()
    {
        $this->AuthLogin();
        $user_id = Session::get('id');
        $all_orders = DB::table('order_details')
            ->join('order_statuses', 'order_details.status', '=', 'order_statuses.status_code')
            ->join('tbl_product', 'order_details.product_id', '=', 'tbl_product.product_id')
            ->join('orders', 'order_details.place_id', '=', 'orders.id')
            ->select('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text', DB::raw('GROUP_CONCAT(tbl_product.product_name) as product_names'), DB::raw('SUM(order_details.quantity * tbl_product.product_price) as total_price'), 'orders.address')
            ->where('order_details.user_id', $user_id)
            ->groupBy('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text', 'orders.address')
            ->paginate(3);

        return view('pages.cart.show_order', ['orders' => $all_orders]);
    }




}
