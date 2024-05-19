<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
// use Mail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashbroad');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function login()
    {
        return view('admin.admin_login');
    }

    public function login_check(Request $request)
    {
        $admin_email = $request->user_login;
        $admin_password = $request->pass_login;

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            // return view('admin.dashbroad');
            return Redirect::to('/dashbroad');
        } else {
            Session::put('message', 'Error password or email not exist');
            return Redirect::to('/admin');
        }
    }
    public function index()
    {
        $this->AuthLogin();
        return view('admin.dashbroad');
    }
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return view('admin.admin_login');
    }
    public function send_email()
    {
        $data = array('name' => "My Test");

        Mail::send('pages.email', $data, function ($message) {
            $message->to('tranhuumy2902@gmail.com', 'Huu My')
                ->subject('Laravel Test Mail');
            $message->from('tranhuumy2902@gmail.com', 'Test Mail');
        });
    }
}
