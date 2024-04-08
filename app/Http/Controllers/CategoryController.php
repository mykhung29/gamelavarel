<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
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
    public function addCategoryProduct()
    {
        $this->AuthLogin();
        return view('admin.add_category');
    }

    public function showCategoryProduct()
    {
        $this->AuthLogin();
        $all_category = DB::table('tbl_category')->get();
        $manager_category = view('admin.show_category')->with('all_caterogy', $all_category);
        return view('admin_layout')->with('admin.show_category', $manager_category);
    }

    public function saveCategoryProduct(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_description;
        $data['category_status'] = $request->category_type;
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Thêm danh mục thành công');
        return Redirect::to('/add-category-product');
    }

    public function activeCategoryProduct($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status' => 1]);
        Session::put('message', 'Đã hiện');
        return Redirect::to('/show-category-product');
    }

    public function unactiveCategoryProduct($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status' => 0]);
        Session::put('message', 'Đã ẩn');
        return Redirect::to('/show-category-product');
    }

    public function deleteCategoryProduct($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->delete();
        Session::put('message', 'Đã xóa');
        return Redirect::to('/show-category-product');
    }

    public function editCategoryProduct($category_id)
    {
        $this->AuthLogin();
        $all_category = DB::table('tbl_category')->where('category_id', $category_id)->get();
        $manager_category = view('admin.edit_category')->with('edit_caterogy', $all_category);
        return view('admin_layout')->with('admin.edit_category', $manager_category);
    }

    public function updateCategoryProduct(Request $request, $category_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_description;
        DB::table('tbl_category')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Cập nhật danh mục thành công');
        return Redirect::to('/show-category-product');
    }
}