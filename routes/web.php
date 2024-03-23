<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomeController;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


Route::get('/trangchu', function () {
    return view('pages.home');
});

Route::get('/', function () {
    return view('pages.home');
});


// admin
Route::get('/admin', function () {
    return view('admin_login');
});
Route::get('/dashbroad', function () {
    return view('admin.dashbroad');
});

Route::post('/admin-dashbroad', function (Request $request) {
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
});

Route::get('/logout', function () {
    return view('admin_login');
});

// category product

Route::get('/add-category-product', function () {
    return view('admin.add_category');
});

Route::get('/show-category-product', function () {
    $all_category = DB::table('tbl_category')->get();
    $manager_category = view('admin.show_category')->with('all_caterogy', $all_category);
    return view('admin_layout')->with('admin.show_category', $manager_category);

});

Route::post('/save-category-product', function (Request $request) {

    $data = array ();
    $data['category_name'] = $request->category_name;
    $data['category_desc'] = $request->category_description;
    $data['category_status'] = $request->category_type;
    DB::table('tbl_category')->insert($data);
    Session::put('message', 'Thêm danh mục thành công');
    return Redirect::to('/add-category-product');
});

Route::get('/active-category-product/{category_id}', function ($category_id) {
    DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status' => 1]);
    Session::put('message', 'Đã hiện');
    return Redirect::to('/show-category-product');

});

Route::get('/unactive-category-product/{category_id}', function ($category_id) {
    DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status' => 0]);
    Session::put('message', 'Đã ẩn');
    return Redirect::to('/show-category-product');
});

Route::get('/delete-category-product/{category_id}', function ($category_id) {
    DB::table('tbl_category')->where('category_id', $category_id)->delete();
    Session::put('message', 'Đã xóa');
    return Redirect::to('/show-category-product');
});

Route::get('/edit-category-product/{category_id}', function ($category_id) {
    $all_category = DB::table('tbl_category')->where('category_id', $category_id)->get();
    $manager_category = view('admin.edit_category')->with('edit_caterogy', $all_category);
    return view('admin_layout')->with('admin.edit_category', $manager_category);
});

Route::post('/update-category-product/{category_id}', function (Request $request, $category_id) {

    $data = array ();
    $data['category_name'] = $request->category_name;
    $data['category_desc'] = $request->category_description;
    DB::table('tbl_category')->where('category_id', $category_id)->update($data);
    Session::put('message', 'Cập nhật danh mục thành công');
    return Redirect::to('/show-category-product');
});

// product

Route::get('/add-product', function () {
    $cate_product = DB::table('tbl_category')->orderBy('category_id', 'desc')->get();
    return view('admin.add_product')->with('cate_product', $cate_product);
});

Route::get('/show-product', function () {
    $all_product = DB::table('tbl_product')->get();
    $manager_product = view('admin.show_product')->with('all_product', $all_product);
    return view('admin_layout')->with('admin.show_product', $manager_product);

});

Route::post('/save-product', function (Request $request) {

    $data = array ();
    $data['product_caterogy	'] = $request->product_category;
    $data['product_name'] = $request->product_name;
    $data['product_price'] = $request->product_price;
    $data['product_img'] = $request->product_img;
    $data['product_video'] = $request->product_video;
    $data['product_desc'] = $request->product_desc;
    $data['product_status'] = $request->product_status;

    DB::table('tbl_product')->insert($data);
    Session::put('message', 'Thêm sản phẩm thành công');
    return Redirect::to('/add-product');
});